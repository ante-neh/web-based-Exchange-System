<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function cartindex()
    {   
        if(Auth::id())
        { 
            return view('home.cart',[
                'carts'=>Cart::where('userId','=', Auth::user()->id)->get()
            ]);
        }

    else
    {
        return redirect('register');
    }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
        if(Auth::id()){
            $user = Auth::user();
            $userId = $user->id;
            $product = Product::findOrFail($id);
            $productExistId = Cart::where('productId','=',$id)->where('userId','=',$userId)->get('id')->first();


            if($productExistId)
            {
                $cart = Cart::find($productExistId)->first();
                $quantity = $cart->quantity;
                $cart->quantity = $quantity + $request->quantity;
                $cart->price = $product->price * $cart->quantity;
                $cart->save();
                return redirect()->back();
            }
            else
            {
                Cart::create([
                    'name'=>$user->name,
                    'email'=>$user->email,
                    'phone'=>$user->phone,
                    'address'=>$user->address,
                    'productName'=>$product->name,
                    'quantity'=>$request->quantity,
                    'quality'=>$product->quality,
                    'price'=>$product->price * $request->quantity,
                    'productId'=>$product->id,
                    'userId'=>$user->id
                ]);
    
                return redirect()->back();
            }
           
        }

        else{
            return redirect('register');
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroycart(string $id)
    {
        Cart::destroy($id);
        return redirect()->back();
    }
}
