<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']); 
    Route::post('/create', [UserController::class, 'store']);   
    Route::put('/update/{id}', [UserController::class, 'update']); 
    Route::delete('/delete/{id}', [UserController::class, 'destroy']);
});
