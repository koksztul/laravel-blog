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
Route::get('/logout', 'HomeController@logout');

Route::get('/', [App\Http\Controllers\PostController::class, 'index']);

Route::get('/post/{slug}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.single');
Route::post('/comment/create', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.create');

Route::get('admin/post/create', 'App\Http\Controllers\Admin\PostController@create')->name('admin.post.create');
Route::post('admin/post/create', 'App\Http\Controllers\Admin\PostController@store');
Route::get('admin/post/{id}', 'App\Http\Controllers\Admin\PostController@edit')->name('admin.post.edit');
Route::put('admin/post/{id}', 'App\Http\Controllers\Admin\PostController@update');
Route::delete('admin/post/{id}', 'App\Http\Controllers\Admin\PostController@destroy')->name('admin.post.delete');
