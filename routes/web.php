<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Usercontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::middleware(['auth:sanctum', 'verified'])->prefix("")->group( function () {

    Route::get('dashboards',function(){
        return view('dashboard');
    })->name('dashboard');
    Route::get('',[HomeController::class,'index'])->name('cts.home');
    Route::resource('/products', ProductController::class);

    Route::prefix('user')->group(function(){
        // Route::get('/create'.[UserController::class,'create'])->name('dashboard.create');
        // Route::post('/store'.[UserController::class,'store'])->name('dashboard.store');
        Route::get('/list',[UserController::class,'index'])->name('cts.user.list');
        Route::get('/{id}/edit',[UserController::class,'edit'])->name('cts.user.edit');
        Route::post('{id}/update',[UserController::class,'update'])->name('cts.user.update');
        Route::get('/{id}/delete',[UserController::class,'delete'])->name('cts.user.delete');

    }); 
    Route::prefix('product')->group(function(){
        Route::get('/create',[ProductController::class,'create'])->name('cts.product.create');
        Route::post('/store',[ProductController::class,'store'])->name('cts.product.store');
        Route::get('/list',[ProductController::class,'list'])->name('cts.product.list');
        Route::get('/{id}/edit',[ProductController::class,'edit'])->name('cts.product.edit');
        Route::post('/{id}/update',[ProductController::class,'update'])->name('cts.product.update');
        Route::get('/{id}/delete',[ProductController::class,'delete'])->name('cts.product.delete');
        Route::get('/{id}/view',[ProductController::class,'view'])->name('cts.product.view');
        Route::get('/search',[ProductController::class,'search'])->name('cts.product.search');


        Route::get('/{id}/image',[ProductController::class,'image'])->name('cts.product.image');
        // Route::post('/{id}/image/update',[ProductController::class,'imageUpdate'])->name('dashboard.product.image.update');
        // Route::post('/image/delete',[ProductController::class,'deleteImage'])->name('dashboard.product.image.delete');
        // Route::get('/{id_product}/image/create',[ProductController::class,'imageCreate'])->name('dashboard.product.image.create');
        // Route::post('/image/store',[ProductController::class,'imageStore'])->name('dashboard.product.image.store');
    }); 
    
});
