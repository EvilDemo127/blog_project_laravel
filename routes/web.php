<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('welcome');
});

// Route::get('/',[ArticleController::class,'index']);
Route::get('/',[ArticleController::class,'index']);
Route::get('/details/{id}',[ArticleController::class,'detail']);
Route::get('/delete/{id}',[ArticleController::class,'delete']);
Route::get('/articles/add',[ArticleController::class,'add']);
Route::get('/articles/profile',[ArticleController::class,'profile']);
Route::post('/articles/create',[ArticleController::class,'create']);
Route::post('/comment/add',[CommentController::class,'add']);
Route::get('/comment/delete/{id}',[CommentController::class,'delete']);

Auth::routes();
