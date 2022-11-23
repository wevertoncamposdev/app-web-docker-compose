<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Route::get('/disclosure', \App\Http\Controllers\Api\DisclosureController::class);


Route::post('/login', function (Request $request) {
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $user = Auth::user();
        $token = $user->createToken('JWT')->plainTextToken;
        return response()->json($token, 200);
    }
    return response()->json('User Invalid!', 401);
});


Route::middleware('auth:sanctum')->group(function(){
    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('disclosure', \App\Http\Controllers\Api\DisclosureController::class)->only('store','update','destroy');
    //Route::apiResource('disclosure', \App\Http\Controllers\Api\DisclosureController::class);
});


//Route Public
Route::apiResource('users', \App\Http\Controllers\Api\UserController::class)->only('index','show');
Route::apiResource('disclosure', \App\Http\Controllers\Api\DisclosureController::class)->only('index','show');