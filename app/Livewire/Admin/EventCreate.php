<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Event as ModelsEvent;

class EventCreate extends Component
{
    use WithFileUploads;

    public $name, $description, $start_at, $end_at, $location, $status = false, $image;

    public function save()
    {
        $this->validate([
            'name' => 'required|min:5',
            'description' => 'nullable',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
            'location' => 'required',
            'image' => 'required|image|max:2048', // Cover Utama
        ]);

        $imageName = time() . '_cover.' . $this->image->extension();
        $this->image->storeAs('event', $imageName, 'public');

        ModelsEvent::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'description' => $this->description,
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
            'location' => $this->location,
            'status' => $this->status,
            'image_url' => $imageName,
        ]);

        session()->flash('success', 'Event berhasil dibuat! Silakan tambah galeri di halaman edit.');
        return redirect()->route('admin.event');
    }
    public function render()
    {
        return view('livewire.admin.event-create');
    }
}