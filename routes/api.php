<?php

use App\Http\Controllers\api\allProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/stateless',[allProductController::class,'statelessProduct']);
Route::post('/restfull',[allProductController::class,'restfullProduct']);
Route::post('/update/{pid}',[allProductController::class,'updateProduct']);
Route::get('/delete/{pid}',[allProductController::class,'deleteProduct']);
