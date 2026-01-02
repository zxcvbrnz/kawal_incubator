<?php

namespace App\Livewire\Admin;

use App\Models\Event as ModelsEvent;
use Livewire\Component;
use Livewire\WithPagination;

class Event extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.admin.event', [
            'events' => ModelsEvent::paginate(9)
        ]);
    }
    public function updatedPaginators()
    {
        $this->dispatch('page-changed');
    }
}