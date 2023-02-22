<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('jwt.auth')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('jwt.refresh')->post('/refresh', function () {
    return response()->json(['success' => true]);
});

Route::post('/register',  [\App\Http\Controllers\Api\AuthController::class, 'register'])->name('register.register');;

Route::post('/login',  [\App\Http\Controllers\Api\AuthController::class, 'login'])->name('login.login');;

Route::get('/review', [\App\Http\Controllers\Api\ReviewController::class, 'index'])->name('reviews.index');

Route::middleware(['jwt.auth'])->group(function () {
    Route::post('/review', [\App\Http\Controllers\Api\ReviewController::class, 'store']);
    Route::delete('/review', [\App\Http\Controllers\Api\ReviewController::class, 'destroy']);
});
