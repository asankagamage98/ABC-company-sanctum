<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\ProductController;
use App\http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/


//public routes

//new public routes
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/getall',[AuthController::class,'getUserAll']);

//protected routes
Route::group(['middleware' => ['auth:sanctum']],function(){
    Route::get('products/search/{name}',[ProductController::class,'search']);
    Route::post('/products',[ProductController::class,'store']);
    Route::put('products/{id}',[ProductController::class,'update']);
    Route::delete('products/{id}',[ProductController::class,'destroy']);

    Route::get('/products',[ProductController::class,'index']);
    Route::get('products/{id}',[ProductController::class,'show']);


    Route::post('/logout',[AuthController::class,'logout']);

});
