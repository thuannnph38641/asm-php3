<?php



use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/categories/{id}/products', [HomeController::class, 'getProducts'])->name('getProducts');
Route::get('/categories/{category_id}/products/{id}/{slug}', [HomeController::class, 'detailProduct'])->name('detailProduct');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Auth::routes();

Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/login', [LoginController::class , 'showLoginForm'])->name('login');
Route::get('/register', [RegisterController::class , 'showRegisterForm'])->name('register');