<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EventController;

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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/event', [EventController::class, 'index']);
Route::post('/event', [EventController::class, 'create']);
Route::put('/event', [EventController::class, 'update']);
Route::delete('/event', [EventController::class, 'delete']);

Route::get('/product', [ProductController::class, 'index']);
Route::post('/product', [ProductController::class, 'create']);
Route::put('/product', [ProductController::class, 'update']);
Route::delete('/product', [ProductController::class, 'delete']);

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'create']);
Route::put('/contact', [ContactController::class, 'update']);
Route::delete('/contact', [ContactController::class, 'delete']);
