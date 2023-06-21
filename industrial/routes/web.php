<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChapaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class, 'index'])->name('userPage');
Route::get('/homePro', [HomeController::class, 'homePro'])->name('homePro');
Route::get('/homeCategories',[HomeController::class, 'homeCategories'])->name('homeCategories');
Route::get('/about',[HomeController::class, 'about'])->name('about');
Route::get('/contact',[HomeController::class, 'contact'])->name('contact');
Route::get('/redirect', [HomeController::class, 'redirect'])->name('adminhome');
Route::get('/create', [CategoryController::class,'create'])->name('createCategory');
Route::get('/category',[CategoryController::class, 'index'])->name('category');
Route::post('/store', [CategoryController::class, 'store'])->name('storeCategory');
Route::get('/edit/{id}',[CategoryController::class, 'edit'])->name('edit');
Route::patch('/update/{id}',[CategoryController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('delete');
Route::get('/adminContact', [ContactController::class, 'index'])->name('adminContact');
Route::get('/product',[ProductController::class, 'index'])->name('product');
Route::get('/create-product', [ProductController::class,'create'])->name('createProduct');
Route::post('/store-product', [ProductController::class, 'store'])->name('storeProduct');
Route::get('/edit-product/{id}',[ProductController::class, 'edit'])->name('editProduct');
Route::patch('/update-product/{id}',[ProductController::class, 'update'])->name('updateProduct');
Route::delete('/delete-product/{id}', [ProductController::class, 'destroy'])->name('deleteProduct');
Route::post('/create-contact',[ContactController::class, 'store'])->name('storeContact');
Route::get('/showCategory/{name}',[CategoryController::class, 'show'])->name('showCategory');
Route::post('/store/{id}',[CartController::class,'store'])->name('addToCart');
Route::get('/cartindex',[CartController::class, 'cartindex'])->name('showCart');
Route::delete('/deleteCart/{id}',[CartController::class, 'destroyCart'])->name('remove');
Route::get('/indexOrder', [OrderController::class, 'indexOrder'])->name('cashOrder');
Route::get('/chapa/{totalPrice}',[ChapaController::class, 'chapa'])->name('chapa');
Route::post('pay/{totalPrice}', 'App\Http\Controllers\ChapaController@initialize')->name('pay');
Route::get('callback/{reference}', [ChapaController::class, 'callback'])->name('callback');
Route::get('/index',[OrderController::class, 'index'])->name('order');
Route::get('/delivered/{id}',[OrderController::class, 'delivered'])->name('orderUpdate');
Route::get('printPdf/{id}',[OrderController::class, 'printPdf'])->name('printPdf');
Route::get('sendEmail/{id}',[OrderController::class, 'sendEmail'])->name('sendEmail');
Route::post('sendUserEmail/{id}',[OrderController::class, 'sendUserEmail'])->name('sendUserEmail');
Route::get('/productSearch',[ProductController::class,'productSearch'])->name('productSearch');
Route::get('/description/{id}',[HomeController::class, 'description'])->name('description');
Route::get('sendEmailToContact/{id}',[ContactController::class, 'sendEmailToContact'])->name('sendEmailToContact');
Route::post('sendContactEmail/{id}',[ContactController::class, 'sendContactEmail'])->name('sendContactEmail');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


