<?php
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('member')
->as('member.')
->group(function(){
    route::get('/', function(){
        return view('admin.member.cart');
    });
 

});