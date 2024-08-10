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

// TODO: GET-> Lab tests

// TODO POST lab tests
// post request of the lab-test to the database
// mailing service to peopleoperations@kompletecare.com✅
// Mail should include My name at the footer of the submission mail✅
// Endpoint will have an authentication for only authenticated users can access this endpoints✅
// provide the auth token for use by the frontend developer✅


