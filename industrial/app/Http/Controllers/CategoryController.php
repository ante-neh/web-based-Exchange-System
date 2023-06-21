<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category',[
            'categories'=>Category::orderBy('updated_at','asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {    
        $request->validate([
            'name'=>'required|unique:categories',
            'image'=>['required','mimes:jpg,png,jpeg']
        ]);

        Category::create([
            'name'=>$request->name,
            'image'=>$this->storeImage($request),
            'featured'=>$request->featured==='yes'
        ]);

        return redirect(route('category'))->with('message','Category has been created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $name)
    {   $category = $name;
        return view('home.showCategory',[
            'products'=>Product::where('categoryName', '=', $name)->get(),
            'category'=>$category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.updateCategory',
        [
            'category'=>Category::where('id', $id)->first()
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

        Category::where('id', $id)->update($request->except(['_method', '_token']));

        return redirect(route('category'))->with('message','Category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::destroy($id);
        return redirect(route('category'))->with('message','Category has been deleted');
    }

    private function storeImage($request){

        $newImageName = uniqid().'-'.$request->name.'.'.$request->image->extension();

        return $request->image->move(public_path('images'),$newImageName);

    }

}
