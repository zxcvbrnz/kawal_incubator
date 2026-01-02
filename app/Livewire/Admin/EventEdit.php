<?php

namespace App\Livewire\Admin;

use App\Models\Event as ModelsEvent;
use App\Models\EventImages;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EventEdit extends Component
{
    use WithFileUploads;

    public ModelsEvent $event;
    public $name, $description, $start_at, $end_at, $location, $status, $new_cover;
    public $gallery_photos = []; // Untuk upload multi-foto baru

    public function mount($id)
    {
        $this->event = ModelsEvent::findOrFail($id);
        $this->name = $this->event->name;
        $this->description = $this->event->description;
        $this->start_at = \Carbon\Carbon::parse($this->event->start_at)->format('Y-m-d\TH:i');
        $this->end_at = \Carbon\Carbon::parse($this->event->end_at)->format('Y-m-d\TH:i');
        $this->location = $this->event->location;
        $this->status = $this->event->status;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'new_cover' => 'nullable|image|max:2048',
        ]);

        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
            'location' => $this->location,
            'status' => $this->status,
        ];

        if ($this->new_cover) {
            Storage::disk('public')->delete('event/' . $this->event->image_url);
            $fileName = time() . '_cover.' . $this->new_cover->extension();
            $this->new_cover->storeAs('events', $fileName, 'public');
            $data['image_url'] = $fileName;
        }

        $this->event->update($data);
        session()->flash('success', 'Data utama diperbarui.');
    }

    // Fungsi upload galeri (bisa banyak foto sekaligus)
    public function updatedGalleryPhotos()
    {
        $this->validate(['gallery_photos.*' => 'image|max:2048']);

        foreach ($this->gallery_photos as $photo) {
            $fileName = uniqid() . '.' . $photo->extension();
            $photo->storeAs('event_gallery', $fileName, 'public');

            $this->event->images()->create([
                'image_url' => $fileName,
                'image_description' => 'Foto galeri untuk ' . $this->event->name
            ]);
        }

        $this->gallery_photos = []; // Reset input
        $this->event->load('images'); // Refresh galeri
    }

    public function deleteImage($imageId)
    {
        $image = EventImages::find($imageId);
        Storage::disk('public')->delete('event_gallery/' . $image->image_url);
        $image->delete();
    }
    public function render()
    {
        return view('livewire.admin.event-edit');
    }
}