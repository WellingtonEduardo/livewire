<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PostForm extends Form
{
    #[Rule('required', 'titulo')]
    public $title;
    #[Rule('required|min:10', 'conteúdo')]
    public $content;

    //     public $rules = [
    //    'title' => ['required'],
    //    'content' => ['required','min:10'],
    //     ];


    //     public function messages()
    //     {
    //         return [
    //             'title' => [
    //                 'required' => 'O título é obrigatório.',
    //             ],
    //             'content' => [
    //                 'required' => 'O conteúdo é obrigatório.',
    //                'min' => 'O conteúdo precisa ter pelo menos :min caracteres.',
    //             ],
    //         ];
    //     }
}