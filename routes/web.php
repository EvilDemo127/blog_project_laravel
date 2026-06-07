<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles',[ArticleController::class,'index']);
Route::get('/details/{id}',[ArticleController::class,'detail']);
Route::get('/delete/{id}',[ArticleController::class,'delete']);
Route::get('/articles/add',[ArticleController::class,'add']);
Route::post('/articles/create',[ArticleController::class,'create']);
Route::get('/comment/delete{id}',[CommentController::class,'delete']);
Route::post('/comment/add',[CommentController::class,'add']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
