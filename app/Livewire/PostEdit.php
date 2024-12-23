<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostEdit extends Component
{
    use WithFileUploads;

    public Post $post;
    #[Rule('required')]
    public string $title;
    #[Rule('required|min:10')]
    public string $content;
    #[Rule('nullable|image|max:1024')]
    public $photo;
    public function render()
    {
        return view('livewire.post-edit');
    }

    public function mount()
    {
        $this->title = $this->post->title;
        $this->content = $this->post->content;
    }

    public function updatedPhoto()
    {
        if (!in_array($this->photo->extension(), ['jpg', 'png', 'jpeg'])) {
            $this->photo = null;
        }
    }
    public function edit()
    {
        $this->validate();
        Post::where('id', '=', $this->post->id)->update([

            'title' => $this->title,
            'content' => $this->content,
            'photo' => $this->photo ? $this->photo->store('photos', 'public') : $this->post->photo,
        ]);

        $this->js(<<<JS
        Swal.fire('Post atualizado com sucesso', '', 'success')
        JS);
    }
}