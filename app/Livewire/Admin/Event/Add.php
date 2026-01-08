<?php

namespace App\Livewire\Admin\Event;

use App\Models\Event;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Add extends Component
{
    use WithFileUploads;

    public $name, $description, $start_at, $end_at, $location, $status = false, $image;

    public function save()
    {
        $this->validate([
            // Menambahkan regex untuk keamanan slug pada nama event
            'name' => [
                'required',
                'min:5',
                'max:255',
                'regex:/^[^?\/#&"\'<>]+$/u'
            ],
            'description' => 'nullable|max:255',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
            'location' => 'required|max:255',
            'image' => 'required|image|max:2048',
        ], [
            // Custom message agar user mengerti batasan karakter
            'name.regex' => 'Nama event tidak boleh mengandung simbol khusus seperti / , ? , # , & , atau tanda kutip.',
        ]);

        $imageName = time() . '_cover.' . $this->image->extension();
        $this->image->storeAs('event', $imageName, 'public');

        Event::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'description' => $this->description,
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
            'location' => $this->location,
            'status' => $this->status,
            'image_url' => $imageName,
        ]);

        session()->flash('success', 'Event berhasil dibuat!');
        return redirect()->route('admin.event');
    }

    public function render()
    {
        return view('livewire.admin.event.add');
    }
}