<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\productController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home')->middleware(['auth']);


// Auth routes
Route::middleware(['guest'])->group(function () {
Route::get('/auth/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/auth/register', [AuthController::class, 'register'])->name('register-post');
Route::get('auth/login', [AuthController::class,'loginForm'])->name('login');
Route::post('/auth/login', [AuthController::class, 'login'])->name('login-post');
}) ;

Route::middleware(['auth'])->group(function () {

// categories routes
Route::get("categories", [categoryController::class, 'index'])->name("category");
Route::get("categories/create" , [categoryController::class, 'create'])->name("category-create");
Route::get("categories/id/{id}", [categoryController::class, 'show' ])->name("category-view");
Route::get("categories/edit/id/{id}", [categoryController::class, 'edit'])->name("category-edit");
Route::put("categories/edit/id/{id}", [categoryController::class, 'update'])->name("category-update");
Route::post("categories/create", [categoryController::class, 'store'])->name("category-store");
Route::delete("categories/delete/id/{id}", [categoryController::class, 'destroy'])->name('category-destroy');



// products routes
Route::get("products", [productController::class, 'index'])->name("product");
Route::get("products/id/{id}", [productController::class, 'show'])->name("product-view");
Route::get('products/create', [productController::class, 'create'])->name("product-create");
Route::post("products/create", [productController::class, 'store'])->name("product-store");
Route::get("products/edit/id/{id}" , [productController::class, 'edit'])->name("product-edit");
Route::put("products/edit/id/{id}" , [productController::class, 'update'])->name("product-update");
Route::delete("products/delete/id/{id}", [productController::class ,'destroy'])->name("product-delete");


Route::post("/auth/logout" , [AuthController::class, 'logout'])->name("logout");
}) ;


