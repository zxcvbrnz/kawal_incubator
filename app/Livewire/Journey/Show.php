<?php

namespace App\Livewire\Journey;

use App\Models\Event;
use Livewire\Component;

class Show extends Component
{
    public $event;
    public $allImages = [];
    public $otherMemories;

    public function mount($slug)
    {
        // Ambil event berdasarkan slug beserta relasi gambarnya
        $this->event = Event::where('slug', $slug)->with('images')->firstOrFail();

        if (!$this->event) {
            abort(response()->view('errors.404-event', [], 404));
        }

        // Gabungkan image utama (jika ada kolom image_url di events) dengan image dari gallery
        $gallery = $this->event->images->pluck('image_url')->toArray();

        // Asumsi image utama ada di table event, jika tidak, cukup gunakan gallery
        if ($this->event->image_url) {
            array_unshift($gallery, $this->event->image_url);
        }

        $this->allImages = $gallery;

        // Ambil 2 event lain untuk sidebar
        $this->otherMemories = Event::where('id', '!=', $this->event->id)
            ->where('status', true)
            ->latest()
            ->take(2)
            ->get();
    }
    public function render()
    {
        return view('livewire.journey.show');
    }
}