<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

public function index(){
    return view('home.userpage',
    [
        'products'=>Product::orderBy('updated_at','asc')->get(),
        'categories'=>Category::orderBy('updated_at','asc')->get()
    ]);
}

public function about(){
    return view('home.about');
}

public function contact(){
    return view('home.contact');
}
public function homePro(){
    return view('home.product',
[
    'products'=>Product::orderBy('updated_at','asc')->get()
]);
} 
public function homeCategories(){
    return view('home.categories',
[
    'categories'=>Category::orderBy('updated_at','asc')->get()
]);
} 


public function redirect(){
$usertype = Auth::user()->usertype;

if ($usertype == '1'){
    $orders = Order::orderBy('updated_at', 'asc')->get();
    $prices = $orders->pluck('price');
    $totalPrice = $prices->sum();
    return view('admin.home',[
        'products'=>Product::orderBy('updated_at','asc')->get(),
        'categories'=>Category::orderBy('updated_at','asc')->get(),
        'orders'=>Order::orderBy('updated_at','asc')->get(),
        'totalPrice'=>$totalPrice
    ]);
}
else{
    return view('home.userpage',
    [
        'products'=>Product::orderBy('updated_at','asc')->paginate(10),
        'categories'=>Category::orderBy('updated_at','asc')->get()
    ]
);
}
}

public function description($id)
{
    return view('home.description',
    [
        'product'=>Product::where('id','=',$id)->first()
    ]);
}
}
