<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;


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
        Route::post('/image/delete',[ProductController::class,'imageDelete'])->name('cts.product.image.delete');
        Route::get('/{id}/image/destroy',[ProductController::class,'deleteMutilImage'])->name('cts.product.image.destroy');
        Route::get('/{id}/image/delete',[ProductController::class,'deleteAllImage'])->name('cts.product.image.deleteAllImage');
        Route::get('/{id_product}/image/create',[ProductController::class,'imageCreate'])->name('cts.product.image.create');
        Route::post('/image/store',[ProductController::class,'imageStore'])->name('cts.product.image.store');

        Route::get('/done_product',[ProductController::class,'productDoneView'])->name('cts.productDone');
    }); 

    Route::prefix("order")->group(function(){
        Route::get("/list",[OrderController::class,"index"])->name("order.list");
        Route::get('/{id}/create',[OrderController::class,'create'])->name('order.create');
        Route::post('/store',[OrderController::class,'store'])->name('order.store');
        Route::get('/{id}/edit',[OrderController::class,'edit'])->name('order.edit');
        Route::post('/update',[OrderController::class,'update'])->name('order.update');
        Route::get('/{id}/delete',[OrderController::class,'delete'])->name('order.delete');
        Route::get('/{id}/view',[OrderController::class,'view'])->name('order.view');
        Route::get('/search',[OrderController::class,'search'])->name('order.search');


        Route::get('/{id}/set_status',[OrderController::class,'setStatusOrder'])->name('order.setStatusOrder');
        Route::post('/delete_product',[OrderController::class,"deleteProduct"])->name('order.delete_product');
        Route::get('/done_order',[OrderController::class,'orderDoneView'])->name('order.orderDone');

    });
    
});

Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    Mail::to('email@gmail.com')->send(new \App\Mail\MyTestMail($details));
   
    dd("Email is Sent.");
});