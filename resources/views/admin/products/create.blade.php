@extends('admin.layouts.master')
@section('content')
<h2 class="text-center">Thêm mới sản phẩm</h2>
<form action="{{route('admin.products.store')}}" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="row">
      <div class="col-md-6">
        <!-- Các trường input ở cột bên trái -->
        <div class="mb-3">
          <label for="name" class="form-label">Name Products</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}">
          @error('name')
           <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label><br>   
            <select name="category_id" id="category" class="form-select" >
                @foreach ($categories as $id =>$name)
                <option value="{{$id}}" >{{$name}}</option>
                @endforeach 
            </select>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Slug</label>
            <input type="text" class="form-control" id="" name="slug" value="{{ old('slug')}}"  >
            @error('slug')
             <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        <div class="mb-3">
            <label for="" class="form-label">Image</label>
            <input type="file" class="form-control" id="" name="image" value="{{ old('image')}}">
            @error('image')
            <span class="text-danger">{{ $message }}</span>
           @enderror
          </div>
         
      </div>
      <div class="col-md-6">
        <!-- Các trường input ở cột bên phải -->
        <div class="mb-3">
          <label for="phone" class="form-label">Price Regular</label>
          <input type="number" class="form-control" id="phone" name="price_regular" {{ old('price_regular')}}>
          @error('price_regular')
           <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Price Sale</label>
            <input type="number" class="form-control" id="" name="price_sale" {{ old('price_sale')}}>
            @error('price_sale')
             <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Description</label><br>
            <input type="description" id="" name="description" class="form-control">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Content</label><br>
            <textarea name="content" id="" cols="70" rows="4"></textarea>
          </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
  </form>
    
@endsection