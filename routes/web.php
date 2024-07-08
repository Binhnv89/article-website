<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\CommentController;
use App\Http\Controllers\Client\PostController as ClientPostController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [CategoryController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('category-create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category-store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category-edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('category-update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('category-destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::resource('post', PostController::class);
    Route::resource('account', UserController::class);
});

Route::get('/', [ClientPostController::class, 'index'])->name('home');
Route::resource('posts', ClientPostController::class);
Route::get('posts/category/{id}', [ClientPostController::class, 'showByCategory'])->name('posts.by.category');
Route::post('comment/{post_id}', [ClientPostController::class, 'post_comment'])->name('posts.comment')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
