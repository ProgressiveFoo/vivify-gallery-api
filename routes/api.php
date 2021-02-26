<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ImageController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//auth
Route::post('register', [ AuthController::class, 'register' ])->middleware('guest:api');
Route::post('login', [ AuthController::class, 'login' ])->middleware('guest:api');
Route::post('logout', [ AuthController::class, 'logout' ])->middleware('auth:api');
Route::get('me', [ AuthController::class, 'me' ])->middleware('auth:api');
Route::post('email-check', [ AuthController::class, 'emailCheck' ])->middleware('guest:api');

//gallery

Route::get('galleries', [ GalleryController::class, 'index' ]);
Route::get('galleries/:id', [ GalleryController::class, 'show' ])->middleware('auth:api');
Route::post('create-gallery', [ GalleryController::class, 'store' ])->middleware('auth:api');
Route::post('edit-gallery/:id', [ GalleryController::class, 'update' ])->middleware('auth:api');
Route::post('delete-gallery/:id', [ GalleryController::class, 'destroy' ])->middleware('auth:api');

//comments
Route::post('create-comment', [ CommentController::class, 'store' ]);

//image
Route::post('store-images', [ ImageController::class, 'store' ]);
