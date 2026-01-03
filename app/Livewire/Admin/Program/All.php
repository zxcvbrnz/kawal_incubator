<?php

namespace App\Livewire\Admin\Program;

use App\Models\Program;
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

    public function render()
    {
        return view('livewire.admin.program.all', [
            'programs' => Program::where('name', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate(9)
        ]);
    }
    public function updatedPaginators()
    {
        $this->dispatch('page-changed');
    }
}