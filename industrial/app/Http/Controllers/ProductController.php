<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product',[
            'products'=>Product::orderBy('updated_at','asc')->get()
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createProduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
        $request->validate([
            'categoryName'=>'required',
            'name'=>'required|unique:categories',
            'description' =>'required',
            'quantity'=>'required',
            'quality'=>'required',
            'image'=>['required','mimes:jpg,png,jpeg'],
            'price'=>'required'
            
        ]);

        Product::create([
            'categoryName'=>$request->categoryName,
            'name'=>$request->name,
            'description'=>$request->description,
            'quantity'=>$request->quantity,
            'quality'=>$request->quality,
            'image'=>$this->storeImage($request),
            'featured'=>$request->featured==='yes',
            'price'=>$request->price
        ]);

        return redirect(route('product'))->with('message','Product has been created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.product',[
            'product'=>Product::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.updateProduct',
        [
            'product'=>Product::where('id', $id)->first()
        ]
    );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|unique:categories,name,'.$id,
            'image'=>['mimes:jpg,png,jpeg']
        ]);

        Product::where('id', $id)->update($request->except(['_method', '_token']));

        return redirect(route('product'))->with('message','Product has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        return redirect(route('product'))->with('message','Product has been deleted');
    }

    private function storeImage($request){

        $newImageName = uniqid().'-'.$request->name.'.'.$request->image->extension();

        return $request->image->move(public_path('images'),$newImageName);

    }

    public function showCategory(string $category){
        return view('home.showCategory',[
            'products'=>Product::findOrFail($category)
        ]);
    }

    public function productSearch(Request $request){
        $searchText = $request->search;
        $products = Product::where('name','LIKE',"%$searchText%")->paginate(10);
        if ($products -> count() > 0)
        {
            return view('home.product',[
                'products'=>$products
            ]);
        }

        else{
            return view('home.noproduct');
        }
        
    }
}
