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
        // 1. Ambil data dengan first()
        $this->event = Event::where('slug', $slug)->with('images')->first();

        // 2. Jika tidak ditemukan, langsung hentikan proses dan tampilkan view 404 custom
        if (!$this->event) {
            abort(response()->view('errors.404-event', [], 404));
        }

        // 3. Logika pengolahan gambar (Hanya jalan jika event ditemukan)
        $gallery = $this->event->images->pluck('image_url')->toArray();

        if ($this->event->image_url) {
            array_unshift($gallery, $this->event->image_url);
        }

        $this->allImages = $gallery;

        // 4. Ambil memori lain
        $this->otherMemories = Event::where('id', '!=', $this->event->id)
            ->where('status', true)
            ->latest()
            ->take(2)
            ->get();
    }

    public function render()
    {
        // Berikan perlindungan tambahan: jika mount gagal, render tidak akan memproses data null
        return view('livewire.journey.show');
    }
}