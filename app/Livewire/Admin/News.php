<?php

namespace App\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class News extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.admin.news', [
            'posts' => Post::paginate(9)
        ]);
    }
    public function updatedPaginators()
    {
        $this->dispatch('page-changed');
    }
}