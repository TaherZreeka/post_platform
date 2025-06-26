<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\AuthController;

// Route::get('/admin/posts/index', function () {
//     return view('admin.posts.index');
// });

Route::prefix('admin')->name('admin.')->middleware(['auth', 'checkadmin'])->group(function () {
    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
    // Route::get('posts/create', [\App\Http\Controllers\Admin\PostController::class, 'create'])->name('admin.posts.create');
});

Auth::routes();
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
