<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;

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
Route::post('/login',[LoginController::class,'login']);

Route::post('/register',  [UserController::class, 'store']);

Route::resource('roles', RoleController::class);

Route::middleware('valid')->group(function () {
    Route::resource('albums',AlbumController::class);
    Route::get('/task',[ArtistController::class,'index']);
    Route::get('/task/{id}',[ArtistController::class,'show']);

});


