<?php

namespace App\Livewire\Admin\Event;

use App\Models\Event;
use App\Models\EventImages;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;

class Edit extends Component
{
    use WithFileUploads;

    public Event $event;
    public $name, $description, $start_at, $end_at, $location, $status, $new_cover;
    public $gallery_photos = []; // Untuk upload multi-foto baru

    public function mount($id)
    {
        $this->event = Event::findOrFail($id);
        $this->name = $this->event->name;
        $this->description = $this->event->description;
        $this->start_at = Carbon::parse($this->event->start_at)->format('Y-m-d\TH:i');
        $this->end_at = Carbon::parse($this->event->end_at)->format('Y-m-d\TH:i');
        $this->location = $this->event->location;
        $this->status = (string) $this->event->status;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:5|max:255',
            'description' => 'nullable|max:255',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
            'location' => 'required|max:255',
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
        $this->dispatch('swal', [
            'type'    => 'success',
            'title'   => 'Berhasil!',
            'message' => 'Data utama diperbarui.'
        ]);
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
        return view('livewire.admin.event.edit');
    }

    #[On('delete')]
    public function delete()
    {
        foreach ($this->event->images as $img) {
            Storage::disk('public')->delete('event_gallery/' . $img->image_url);
        }
        $this->event->images()->delete();

        if ($this->event->image_url) {
            Storage::disk('public')->delete('events/' . $this->event->image_url);
        }

        $this->event->delete();

        return redirect()->route('admin.event')->with('success', 'Event berhasil dihapus permanen.');
    }
}