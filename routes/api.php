<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(CommentController::class)->group(function (){
    Route::get('comments/all','findByPostId');
    Route::post('comments-post/store','CommentsPoststore');
    Route::post('comment/store','store');
});

Route::controller(PostController::class)->group(function (){
    Route::get('post','findById');
});
