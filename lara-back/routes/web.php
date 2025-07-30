<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::post('/api/savepost', [PostController::class, 'savePost']);
Route::get('/api/gettitle', [PostController::class, 'getTitle']);
Route::get('/api/getpost/{id}', [PostController::class, 'getPost']);
Route::get('/api/postcount', [PostController::class, 'postCount']);