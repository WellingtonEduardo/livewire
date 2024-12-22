<?php

use App\Http\Controllers\PostCreateController;
use Illuminate\Support\Facades\Route;

Route::get('post/create', [PostCreateController::class, 'create'])->name('post.create');
