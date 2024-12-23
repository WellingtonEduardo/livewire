<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = [
       'search' => ['as' => 'q', 'except' => '']
    ];


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // Busca e paginação
        $posts = Post::where('title', 'like', '%' . $this->search . '%')
            ->orWhere('content', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.home', [
            'posts' => $posts, // Envia o objeto LengthAwarePaginator para a view
        ]);
    }
}