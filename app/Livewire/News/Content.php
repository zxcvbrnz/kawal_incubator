<?php

namespace App\Livewire\News;

use Livewire\Component;
use Livewire\WithPagination;

class Content extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.news.content', [
            'posts' => \App\Models\Post::latest()->paginate(24)
        ]);
    }

    public function updatedPaginators()
    {
        $this->dispatch('page-changed');
    }
}