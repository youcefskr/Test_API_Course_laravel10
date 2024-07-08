<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostsController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/posts',[PostsController::class,'index']);
Route::get('/post/{id}',[PostsController::class,'show']);
Route::post('/posts',[PostsController::class,'store']);
Route::post('/post/{id}',[PostsController::class,'update']);
Route::post('/posts/{id}',[PostsController::class,'destroy']);

