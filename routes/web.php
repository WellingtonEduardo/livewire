<?php

use App\Http\Controllers\PostCreateController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['posts' => Post::all()]);
});

Route::get('post/create', [PostCreateController::class, 'create'])->name('post.create');

Route::get('post/edit/{post}', [PostCreateController::class, 'edit'])->name('post.edit');