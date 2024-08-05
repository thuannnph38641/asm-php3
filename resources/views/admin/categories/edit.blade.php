@extends('admin.layouts.master')
@section('content')
<h1>Cập nhật {{$categories->name}}</h1>
        <form action="{{route('admin.categories.update',$categories->id)}}" method="post">
        @csrf
        @method('put')
       
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="exampleInputEmail1"   {{ old('name')}} value="{{$categories->name}}">
              @error('name')
              <span class="text-danger">{{ $message }}</span>
              @enderror
             
            </div>
            <div class="form-group">
                <label for="status">Trạng thái</label>
                <input type="checkbox" id="status" name="is_active" {{ old('is_active') }} 
                    {{$categories->is_active ? 'checked' : ''}}
                >
            </div>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
          
        </form>
@endsection