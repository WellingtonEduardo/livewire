<?php

namespace App\Livewire;

use App\Livewire\Forms\PostForm;
use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;

class PostCreate extends Component
{
    public PostForm $form;
    public function render()
    {
        return view("livewire.post-create");
    }

    public function create()
    {

        $this->validate();

        Post::create([
         'title' => $this->form->title,
         'content' => $this->form->content,
         'user_id' => 1,
         'slug' => Str::slug($this->form->title)
        ]);
        $this->form->title = '';
        $this->form->content = '';

        session()->flash('success', 'Criado com sucesso.');
    }
}