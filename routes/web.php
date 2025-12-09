<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['role:admin'])->group(function () {
    Route::resource('categories', CategoryController::class);
});

Route::middleware(['role:admin'])->group(function() {
    Route::get('categories/{category}/products', [CategoryController::class, 'show'])->name('categories.products.index');
    
    Route::resource('products', ProductController::class);
});

Route::get('/', function() { return redirect()->route('login'); });