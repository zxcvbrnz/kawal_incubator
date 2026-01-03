<?php

namespace App\Livewire\Admin\Event;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class All extends Component
{
    use WithPagination;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatedPaginators()
    {
        $this->dispatch('page-changed');
    }
    public function render()
    {
        return view('livewire.admin.event.all', [
            'events' => Event::where('name', 'like', '%' . $this->search . '%')
                ->paginate(9)
        ]);
    }
}