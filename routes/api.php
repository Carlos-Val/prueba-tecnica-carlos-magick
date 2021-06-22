<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Rutas controladoras del User
Route::get('/user', [UserController::class, 'allUsers']);
Route::post('/user', [UserController::class, 'registerUser']);
Route::post('/user/login', [UserController::class, 'loginUser']);
Route::post('/user/logout', [UserController::class, 'logOutUser']);
Route::put('/user/{id}', [UserController::class, 'updateUser']);
Route::delete('/user/{id}', [UserController::class, 'deleteUser']);

//Rutas controladoras del Post

Route::get('/post', [PostController::class, 'allPosts']);
Route::post('/post', [PostController::class, 'createPost']);
Route::put('/post/{id}', [PostController::class, 'updatePost']);
Route::delete('/post/{id}', [PostController::class, 'deletePost']);




