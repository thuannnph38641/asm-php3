<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_UPLOAD = 'products';
    public function index()
    {
        $products = Product::with('category')->latest('id')->get();
                        
    
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->where('is_active', true)->pluck('name','id')->all();
        return view('admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('image');
         $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'image' => 'required',
            'price_regular' => 'required|numeric',
            'price_sale' => 'required|numeric',
        ], [
            'name.required' => 'Vui lòng nhập tên của bạn!',
            'slug.required' => 'Vui lòng nhập slug của bạn.',
            'price_regular.required' => 'Vui lòng nhập price_regular',
            'price_regular.numeric' => 'price_regular phải là số',
            'price_sale.required' => 'Vui lòng nhập price_sale',
            'price_sale.numeric' => 'price_sale phải là số',
        ]);
       
    
        if($request->hasFile('image')){
            $data['image'] = \Storage::put(self::PATH_UPLOAD, $request->file('image'));
        };
        Product::create($data);
        $request->session()->flash('success','Thêm mới thành công');
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('category')->findOrFail($id);
        $categories = Category::query()->where('is_active', true)->get();
        return view('admin.products.show', compact('product', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::with('category')->findOrFail($id);
        $categories = Category::query()->where('is_active', true)->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = Product::findOrFail($id);
        $data = $request->except('image');
        $request->validate([
           'name' => 'required|max:255',
           'slug' => 'required',
           'image' => 'required',
           'price_regular' => 'required|numeric',
           'price_sale' => 'required|numeric',
       ], [
           'name.required' => 'Vui lòng nhập tên của bạn!',
           'slug.required' => 'Vui lòng nhập slug của bạn.',
           'price_regular.required' => 'Vui lòng nhập price_regular',
           'price_regular.numeric' => 'price_regular phải là số',
           'price_sale.required' => 'Vui lòng nhập price_sale',
           'price_sale.numeric' => 'price_sale phải là số',
       ]);
      
   
       if($request->hasFile('image')){
           $data['image'] = \Storage::put(self::PATH_UPLOAD, $request->file('image'));
           if($model->image){
            \Storage::delete($model->image);
           }
       };
       $model->update($data);
       
       return back();
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Product::findOrFail($id);
        $model->delete();
        if($model->image){
            \Storage::delete($model->image);
        }
        return back();
    }
}
