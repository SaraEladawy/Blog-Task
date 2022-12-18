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

Route::redirect('/', 'login');



Auth::routes();

//Posts Route
Route::get('/posts', [App\Http\Controllers\PostsController::class, 'index'])->name('posts.index')
    ->middleware(['auth', 'grantAccess:posts-index']);
Route::get('/posts/create', [App\Http\Controllers\PostsController::class, 'create'])->name('posts.create')
    ->middleware(['auth','grantAccess:posts-store']);
Route::post('/posts/store', [App\Http\Controllers\PostsController::class, 'store'])->name('posts.store')
    ->middleware(['auth','grantAccess:posts-store']);
Route::get('/posts/{post}/edit', [App\Http\Controllers\PostsController::class, 'edit'])->name('posts.edit')
    ->middleware(['auth','grantAccess:posts-store']);
Route::patch('/posts/{post}', [App\Http\Controllers\PostsController::class, 'update'])->name('posts.update')
    ->middleware(['auth','grantAccess:posts-update']);
Route::delete('/posts/{post}', [App\Http\Controllers\PostsController::class, 'destroy'])->name('posts.destroy')
    ->middleware(['auth','grantAccess:posts-delete']);

//Comments Route
Route::resource('posts.comments', App\Http\Controllers\CommentsController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
