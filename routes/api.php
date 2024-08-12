<?php

use App\Http\Controllers\AuthenticateUser;
use App\Http\Controllers\LaboratoryTestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get ('/test', function (Request $request) {
    return response()->json(["message" => "success"]);
});

/*
|--------------------------------------------------------------------------
| authenticate route -> email, password
|--------------------------------------------------------------------------
*/
Route::post('/authenticate_user', AuthenticateUser::class);


/*
|--------------------------------------------------------------------------
| Laboratory test
|--------------------------------------------------------------------------
*/
Route::prefix('user')->middleware('auth:sanctum')->group(function () {
    Route::get('/laboratory_test', [LaboratoryTestController::class, "index"]);
    Route::post('/laboratory_test', [LaboratoryTestController::class, 'store']);
});


