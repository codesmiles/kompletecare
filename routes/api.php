<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('user')->group(function () {
    // Route::post('/update_medicals', [\App\Http\Controllers\UserController::class, 'update']);
    // Route::get('/get_medicals', [\App\Http\Controllers\UserController::class, 'l']);
});
