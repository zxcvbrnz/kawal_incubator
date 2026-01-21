<?php

namespace App\Livewire\Video;

use App\Models\VideoPelajaran;
use Livewire\Component;

class Show extends Component
{
    public $video;

    public function mount($id)
    {
        $this->video = VideoPelajaran::findOrFail($id);
    }

    public function render()
    {
        $recommendations = VideoPelajaran::where('id', '!=', $this->video->id)
            ->limit(5)
            ->get();

        return view('livewire.video.show', [
            'recommendations' => $recommendations
        ]);
    }
}