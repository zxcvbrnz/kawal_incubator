<?php

namespace App\Livewire\Admin\Program;

use App\Models\Program;
use Livewire\Component;
use Livewire\WithFileUploads;

class Add extends Component
{
    use WithFileUploads;

    public $name, $description, $image;

    public function save()
    {
        $this->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|max:255',
            'image' => 'required|image|max:2048',
        ]);

        $imageName = time() . '.' . $this->image->extension();
        $this->image->storeAs('program', $imageName, 'public');

        Program::create([
            'name' => $this->name,
            'description' => $this->description,
            'image_url' => $imageName,
        ]);

        session()->flash('success', 'Program berhasil dibuat!');
        return redirect()->route('admin.program');
    }
    public function render()
    {
        return view('livewire.admin.program.add');
    }
}