<?php

namespace App\Livewire\Event;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class Journey extends Component
{
    use WithPagination;
    public function render()
    {
        $events = Event::with('images')
            ->where('status', true)
            ->latest('start_at')
            ->paginate(5);
        return view('livewire.event.journey', [
            'events' => $events
        ]);
    }
}