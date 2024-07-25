<?php
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
->as('admin.')
->group(function(){
    route::get('/', function(){
        return view('admin.dashboard');
    });
    route::prefix('products')
    ->as('products.')
    ->group(function(){
        route::get('/', [ProductController::class , 'index'])->name('index');
        route::get('create', [ProductController::class , 'create'])->name('create');
        route::post('store', [ProductController::class , 'store'])->name('store');
        route::get('/show/{id}', [ProductController::class , 'show'])->name('show');
        route::get('/{id}/edit', [ProductController::class , 'edit'])->name('edit');
        route::put('/{id}/update', [ProductController::class , 'update'])->name('update');
        route::get('/{id}/destroy', [ProductController::class , 'destroy'])->name('destroy');
    });

});