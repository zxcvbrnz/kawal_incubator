<?php

namespace App\Livewire\Event;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class Content extends Component
{
    use WithPagination;
    public function render()
    {

        return view('livewire.event.content', [
            'events' => Event::where('status', false)
                ->latest('start_at')
                ->paginate(10)
        ]);
    }
}