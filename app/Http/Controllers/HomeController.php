<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('home');
    }
    public function index()
    {
        $categories = Category::query()->where('is_active', true)->get();
        $products = Product::query()->paginate(8);
    
        return view('client.trangchu', compact('categories','products')
        );
    }
    
    public function getProducts($categoryId)
    {
        $category = Category::with('products')->findOrFail($categoryId);
        $products = $category->products;
        $categories = Category::query()->where('is_active', true)->get();
    
        return view('client.trangchu', [
            'category' => $category,
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function detailProduct($category_id, $id, $slug)
    {
        $product = Product::findOrFail($id);
        $relatedProducts = $product->category->products()->where('id','!=','$product->id')->where('slug','!=','$product->slug')->limit(4)->get();
        $categories = Category::query()->where('is_active', true)->get();

        
        return view('client.detail', compact('product', 'relatedProducts', 'categories'));
    }
    

    public function search(Request $request){
        $key = $request->input('key');

        $products = Product::where('name','like', '%'.$key.'%')
                                    ->paginate(8);
        $categories = Category::query()->where('is_active', true)->get();
        return view('client.trangchu',compact('products','key','categories'));
                                    
    }
}
