<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
// use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use PDF;
use Notification;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexOrder()
    {
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
            $order->paymentStatus = 'cash on delivery';
            $order->save();
            $cartId = $data->id;
            $cart = Cart::find($cartId);
            $cart->delete();

        }

        return redirect()->back()->with('message','We have Received your Order. We will contact with you soon...');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function index(){
        return view('admin.order',[
            'orders'=>Order::orderBy('updated_at','asc')->get()
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    public function delivered($id){
        $order = Order::find($id);
        $order->deliveryStatus = "delivered";
        $order->paymentStatus = "paid";
        $order->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function printPdf($id){
        $order = Order::find($id);
        $pdf = PDF::loadView('admin.pdf',compact('order'));
        return $pdf->download('order_details.pdf');
    }

    public function sendEmail($id)
    {   
        $order = Order::find($id);
        return view('admin.email',compact('order'));
    }

    public function sendUserEmail(Request $request, $id)
    {
        $order = Order::find($id);
        $details = [
                    'greating'=> $request->greating,
                    'firstline'=>$request->firstline,
                    'body'=>$request->body,
                    'button'=>$request->button,
                    'url'=>$request->url,
                    'lastline'=>$request->lastline,
        ];

        Notification::send($order, new SendEmailNotification($details));
        return redirect()->back();
    }
}
