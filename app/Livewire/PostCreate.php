<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;

class PostCreate extends Component
{
    public $title;
    public $content;
    public function render()
    {
        return view("livewire.post-create");
    }

    public function create()
    {

        $this->validate([
            'title' => ['required', 'min:10'],
            'content' => ['required']
        ]);

        Post::create([
         'title' => $this->title,
         'content' => $this->content,
         'user_id' => 1,
         'slug' => Str::slug($this->title)
        ]);
        $this->title = '';
        $this->content = '';

        session()->flash('success', 'Criado com sucesso.');
    }
}
