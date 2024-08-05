@extends('admin.layouts.master')
@section('content')
    <div id="app"></div>
    <h2 class="text">Danh sách sản phẩm</h2>
    <a href="{{route('admin.products.create')}}" class="btn btn-primary ">Thêm mới</a>
    <table id="example" class="table table-hover table-bordered dt-responsive nowrap " style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category Name</th>
                <th>Slug</th>
                <th>Image</th>
                <th>Price Regular</th>
                <th>Price Sale</th>
                <th>Description</th>
                <th>Content</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>
                        <img src="{{\Storage::url($item->image)}}" alt="" width="100px">
                    </td>
                    <td>{{ $item->price_regular }}$</td>
                    <td>{{ $item->price_sale }}$</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->content }}</td>
                    <td>{{ $item->created_at->format('d/m/Y H:i:s') }}</td>
                    <td>{{ $item->updated_at->format('d/m/Y H:i:s') }}</td>
                    <td>
                        <a href="{{route('admin.products.show',$item->id)}}" class="btn btn-info">Show</a>
                        <a href="{{route('admin.products.edit',$item->id)}}" class="btn btn-warning">Sửa</a>
                        <a href="{{route('admin.products.destroy',$item->id)}}" class="btn btn-danger"
                            onclick ="return confirm('Bạn có muốn xóa không?')"
                            >Xóa</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    @if (session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
        
    @endif
@endsection
