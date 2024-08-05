@extends('admin.layouts.master')
@section('content')
<h2>Dánh sách danh mục</h2>
<a href="{{route('admin.categories.create')}}" class="btn btn-primary">Thêm mới</a><br> <br>    
<table id="example" class="table table-hover table-bordered dt-responsive nowrap " style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Is Active</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->is_active ? 'Yes' : 'No'}}</td>
                <td>{{ $item->created_at->format('d/m/Y ') }}</td>
                <td>{{ $item->created_at->format('d/m/Y ') }}</td>
                <td><a href="{{ route('admin.categories.edit',$item->id )}}" class="btn btn-warning">Sửa</a>
                    <a href="{{ route('admin.categories.destroy',$item->id )}}" class="btn btn-danger"
                        onclick="return confirm('Bạn có muốn xóa không?')"
                        >Xóa</a>
                    <a href="{{ route('admin.categories.show',$item->id )}}" class="btn btn-info">Xem</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@if (session('success'))
<div class="alert alert-success">{{session('success')}}</div>
    
@endif
    
@endsection