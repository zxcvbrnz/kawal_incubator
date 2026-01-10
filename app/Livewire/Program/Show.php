<?php

namespace App\Livewire\Program;

use App\Models\Program;
use Livewire\Component;

class Show extends Component
{
    public $program;

    public function mount($id)
    {
        $this->program = Program::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.program.show', [
            'otherPrograms' => Program::where('id', '!=', $this->program->id)
                ->limit(5)
                ->get()
        ]);
    }
}