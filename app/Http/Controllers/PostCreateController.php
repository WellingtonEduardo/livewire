<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostCreateController extends Controller
{
    public function create(): View
    {
        return view('post-create');

    }
    public function edit(Post $post): View
    {

        return view('post-edit', ['post' => $post]);

    }
}