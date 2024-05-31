<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/users',[UserController::class,'index' ]);

Route::post('/user',[UserController::class,'store' ]);

Route::get('/user/{id}',[UserController::class,'show' ]);

Route::put('/user/update/{id}',[UserController::class,'update' ]);


Route::delete('/user/delete/{id}',[UserController::class,'delete']);