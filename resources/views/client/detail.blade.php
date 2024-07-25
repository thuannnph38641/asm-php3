@extends('client.layouts.master')
@section('content')
<div class="container-fluid py-5">
   <div class="row px-xl-5">

    <div class="col-lg-5 pb-5">
        <div id="product-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner border">
                <div class="carousel-item active" style="height: 500px; width: 100%;" >
                    <img class="w-100 h-100" src="{{\Storage::url($product->image)}}" alt="Image">
                </div>
                
            </div>              
        </div>
    </div>

    <div class="col-lg-7 pb-5">
        <h3 class="font-weight-semi-bold">{{$product->name}}</h3>
        
        <h3 class="font-weight-semi-bold mb-4">{{$product->price_sale}}$</h3>
        <p class="mb-4">{{$product->description}}</p>
        <p class="mb-4">{{$product->content}}</p>
        
    
        <div class="d-flex align-items-center mb-4 pt-2">
            <div class="input-group quantity mr-3" style="width: 130px;">
                <div class="input-group-btn">
                    <button class="btn btn-primary btn-minus" >
                    <i class="fa fa-minus"></i>
                    </button>
                </div>
                <input type="text" class="form-control bg-secondary text-center" value="1">
                <div class="input-group-btn">
                    <button class="btn btn-primary btn-plus">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
            <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
        </div>
       
    </div>
   
       
    </div>
   
</div>
<!-- Shop Detail End -->


<!-- Products Start -->
<div class="container-fluid py-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
    </div>
    <div class="product-grid">
        @foreach ($relatedProducts as $item)
        <div class="product-item">
            <div class="card product-item border-0">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="{{\Storage::url($item->image)}}" alt="{{$item->name}}">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3">{{$item->name}}</h6>
                    <div class="d-flex justify-content-center">
                        <h6>{{$item->price_regular}}$</h6><h6 class="text-muted ml-2"><del>{{$item->price_sale}}$</del></h6>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="{{ route('detailProduct', ['category_id' => $item->category_id, 'id' => $item->id,'slug' => $item->slug]) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                    <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Products End -->
    
<style>
.product-item {
    width: 300px; /* Điều chỉnh chiều rộng của mỗi sản phẩm */
    height: 400px; /* Điều chỉnh chiều cao của mỗi sản phẩm */
}

.product-item .card {
    width: 100%;
    height: 100%;
}

.product-item .card-img-top {
    height: 200px; /* Điều chỉnh chiều cao của ảnh sản phẩm */
    object-fit: cover; /* Giữ tỷ lệ ảnh và lấp đầy kích thước */
}

.product-item .card-body {
    padding: 1rem; /* Điều chỉnh khoảng cách nội dung trong card */
}
.product-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr); /* 4 cột sản phẩm trong một hàng */
    grid-gap: 20px; /* Khoảng cách giữa các sản phẩm */
}
</style>
@endsection