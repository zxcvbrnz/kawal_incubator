<?php

namespace App\Livewire\Welcome;

use App\Models\Post;
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
            'posts' => Post::latest()->paginate(10)
        ]);
    }
}
