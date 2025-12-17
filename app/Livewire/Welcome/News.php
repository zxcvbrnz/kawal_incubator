<?php

namespace App\Livewire\Welcome;

use Livewire\Component;

class News extends Component
{
    // public $posts = [];

    // public function mount()
    // {
    //     $this->posts = [];
    // }

    public function render()
    {
        return view('livewire.welcome.news', [
            'posts' => \App\Models\Post::latest()->paginate(10)
        ]);
    }
}