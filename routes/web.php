<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', [App\Http\Controllers\PostController::class, 'index']);

Route::get('/post/{slug}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.single');
Route::post('/comment/create', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.create');
