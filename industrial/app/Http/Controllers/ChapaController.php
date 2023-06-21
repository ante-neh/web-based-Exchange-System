<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Chapa\Chapa\Facades\Chapa as Chapa;
use Illuminate\Support\Facades\Auth;

class ChapaController extends Controller
{
    /**
     * Initialize Rave payment process
     * @return void
     */
    protected $reference;

    public function __construct(){
        $this->reference = Chapa::generateReference();

    }
    public function initialize($totalPrice)
    {
        //This generates a payment reference
        $reference = $this->reference;
        
        // Enter the details of the payment
        $data = [
            
            'amount' => $totalPrice,
            'email' => 'amareanteneh12@gmail.com',
            'tx_ref' => $reference,
            'currency' => "ETB",
            'callback_url' => route('callback',[$reference]),
            'first_name' => "Anteneh",
            'last_name' => "Amare",
            "customization" => [
                "title" => 'Chapa payment',
                "description" => "I amma testing this"
            ]
        ];
        
        $payment = Chapa::initializePayment($data);
         

        if ($payment['status'] !== 'success') {
            // notify something went wrong
            return;
        }

        $user = Auth::user();
        $userid = $user->id;
        $datas = Cart::where('userId', '=', $userid)->get();

        foreach($datas as $data)
        {
            $order = new Order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address= $data->address;
            $order->userId = $data->userId;
            $order->productName = $data->productName;
            $order->price= $data->price;
            $order->quality = $data->quality;
            $order->quantity = $data->quantity;
            $order->productId = $data->productId;
            $order->deliveryStatus = 'processing';
            $order->paymentStatus = 'paid';
            $order->save();
            $cartId = $data->id;
            $cart = Cart::find($cartId);
            $cart->delete();

        }

        return redirect($payment['data']['checkout_url']);
    }

    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback($reference)
    {
        
        $data = Chapa::verifyTransaction($reference);
        // dd($data);

        //if payment is successful
        if ($data['status'] ==  'success') {
            return redirect()->route('showCart')->with('message', 'Payment Successful');;
        // dd($data);
        }

        else{
            //oopsie something ain't right.
            return redirect()->route('showCart')->with('message', 'Something went wrong');;
        }


    }

    public function chapa($totalPrice){
        return view('home.chapa',[
            'totalPrice'=>$totalPrice
        ]);
    }
}
