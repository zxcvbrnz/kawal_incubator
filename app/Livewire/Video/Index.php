<?php

namespace App\Livewire\Video;

use App\Models\VideoPelajaran;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        return view('livewire.video.index', [
            'videos' => VideoPelajaran::where('judul', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate(9)
        ]);
    }
}