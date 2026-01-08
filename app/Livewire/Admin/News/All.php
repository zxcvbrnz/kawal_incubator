<?php

namespace App\Livewire\Admin\News;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class All extends Component
{
    use WithPagination;

    public $search = '';

    // Penting: Reset pagination ke halaman 1 saat user mengetik pencarian
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.admin.news.all', [
            'posts' => Post::query()
                ->where('title', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate(10)
        ]);
    }
    public function updatedPaginators()
    {
        $this->dispatch('page-changed');
    }
}