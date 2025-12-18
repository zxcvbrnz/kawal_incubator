<?php

namespace App\Livewire\Welcome;

use App\Models\Program as ModelsProgram;
use Livewire\Component;

class Program extends Component
{
    public function render()
    {
        return view('livewire.welcome.program', [
            'programs' => ModelsProgram::latest()->paginate(3)
        ]);
    }
}
