<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ListOfCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PostController::class, 'index'])->name('home');
Route::resource('posts', PostController::class);
// comment
Route::post('/comment/{id}', [CommentController::class, 'store'])->name('comment.store');

Route::middleware(['auth'])->prefix('dashboard')->group(function () {
  // /dashboard
  Route::get('/', function () {
    return view('dashboard');
  })->name('dashboard');
  //  category
  Route::get('/list-category', [ListOfCategoryController::class, 'index'])->name('categories.home');
  Route::post('/list-category', [ListOfCategoryController::class, 'store'])->name('category.store');
  Route::get('/list-category/delete/{id}', [ListOfCategoryController::class, 'delete'])->name('category.delete');
  Route::get('/list-category/edit/{id}', [ListOfCategoryController::class, 'edit'])->name('category.edit');
  Route::post('/list-category/update/{id}', [ListOfCategoryController::class, 'update'])->name('category.update');

  // post
  Route::get('/all-posts', [PostController::class, 'allPosts'])->name('posts.all');
  Route::get('/all-users', [UserController::class, 'allUsers'])->name('users.all');
  // delete image post
  Route::get('/posts/remove-img/{id}', [PostController::class, 'removeImage'])->name('delete.img');
});


require __DIR__ . '/auth.php';
