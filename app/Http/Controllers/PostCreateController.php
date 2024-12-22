<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostCreateController extends Controller
{
    public function create(): View
    {
        return view('post-create');

    }
}
