<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::post('/api/savepost', [PostController::class, 'savePost']);
Route::get('/api/getpost', [PostController::class, 'getPost']);
