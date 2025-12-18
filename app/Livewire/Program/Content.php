<?php

namespace App\Livewire\Program;

use App\Models\Program;
use Livewire\Component;

class Content extends Component
{
    public function render()
    {
        return view('livewire.program.content', [
            'programs' => Program::latest()->paginate(24)
        ]);
    }
}
