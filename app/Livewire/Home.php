<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Home extends Component
{
    public $posts;
    public $search;
    public function render()
    {

        return view('livewire.home');
    }


    public function mount()
    {
        $this->posts = Post::all();

    }

    public function searchPost()
    {
        $this->posts = Post::where(
            'title',
            'like',
            '%'. $this->search .'%'
        )
        ->orWhere('content', 'like', '%'. $this->search .'%')
        ->get();
    }
}