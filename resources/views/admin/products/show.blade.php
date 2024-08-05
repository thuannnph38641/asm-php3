@extends('admin.layouts.master')
@section('content')
<h2 class="text-center">Chi tiết :{{$product->name}}</h2>
<form action="{{route('admin.products.update', $product->id)}}" enctype="multipart/form-data" method="POST" >
    @csrf
    @method('put')
    <div class="row">
      <div class="col-md-6">
        <!-- Các trường input ở cột bên trái -->
        <div class="mb-3">
          <label for="name" class="form-label">Name Products</label>
          <input type="text" class="form-control" id="name" name="name" {{ old('name')}} value="{{$product->name}}"   disabled >
          @error('name')
           <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label><br>    
            <select name="category_id" id="category" class="form-select"   disabled > 
                @foreach ($categories as $category)
                <option value="{{$category->id}}" @if ($product->category_id == $category->id) selected
                    
                @endif>
                {{$category->name}}
            </option>
                @endforeach 
            </select>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Slug</label>
            <input type="text" class="form-control" id="" name="slug" {{ old('slug')}} value="{{$product->slug}}"   disabled>
            @error('slug')
             <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        <div class="mb-3">
            <label for="" class="form-label">Image</label>
            <input type="file" class="form-control" id="" name="image" value="{{ old('image')}}"   disabled>
            <img src="{{ \Storage::url($product->image)}}" alt="" width="100px">
            @error('image')
            <span class="text-danger">{{ $message }}</span>
           @enderror
          </div>
         
      </div>
      <div class="col-md-6">
        <!-- Các trường input ở cột bên phải -->
        <div class="mb-3">
          <label for="phone" class="form-label">Price Regular</label>
          <input type="number" class="form-control" id="phone" name="price_regular" {{ old('price_regular')}} value="{{$product->price_regular}}"  disabled>
          @error('price_regular')
           <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Price Sale</label>
            <input type="number" class="form-control" id="" name="price_sale" {{ old('price_sale')}} value="{{$product->price_sale}}"  disabled >
            @error('price_sale')
             <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Description</label><br>
            <input type="description" id="" name="description" class="form-control" value="{{$product->description}}" disabled>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Content</label><br>
            <textarea name="content" id="" cols="70" rows="4" value="{{$product->content}}" disabled></textarea>
          </div>
      </div>
    </div>
  </form>
    
@endsection