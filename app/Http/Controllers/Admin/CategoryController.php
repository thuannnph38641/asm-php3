<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::query()->latest('id')->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only(['name', 'is_active']);
        $data['is_active'] ??= 0 ; 
        $request->validate([
            'name' => 'required|max:255',
            'is_active' => 'nullable|boolean',
        ],
    [
        'name.required' => 'Vui lòng nhập tên danh mục',
        'name.max:255' => 'Tên phải không quá 255 ký tự',
    ]);
         Category::create($data);
         $request->session()->flash('success','Thêm mới thành công');
         return redirect()->route('admin.categories.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category::findOrFail($id);
        return view('admin.categories.show', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::findOrFail($id);
        return view('admin.categories.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = Category::findOrFail($id);
    
        $data = $request->validate([
            'name' => 'required|max:255',
            'is_active' => 'nullable|boolean',
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục',
            'name.max:255' => 'Tên phải không quá 255 ký tự',
        ]);
    
        $model->update($data);
    
        return back();
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Category::findOrFail($id);
        $model->delete();
        return back();
    }
}
