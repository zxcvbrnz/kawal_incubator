<?php

namespace App\Livewire\Admin\Program;

use App\Models\Program;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public Program $program;
    public $name, $description, $new_image;

    public function mount($id)
    {
        $this->program = Program::findOrFail($id);
        $this->name = $this->program->name;
        $this->description = $this->program->description;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|max:255',
            'new_image' => 'nullable|image|max:2048',
        ]);
        $data = ['name' => $this->name, 'description' => $this->description];

        if ($this->new_image) {
            Storage::disk('public')->delete('program/' . $this->program->image_url);
            $name = time() . '.' . $this->new_image->extension();
            $this->new_image->storeAs('program', $name, 'public');
            $data['image_url'] = $name;
        }

        $this->program->update($data);
        $this->dispatch('swal', [
            'type'    => 'success',
            'title'   => 'Berhasil!',
            'message' => 'Program berhasil diperbarui.'
        ]);
    }

    public function delete()
    {
        Storage::disk('public')->delete('program/' . $this->program->image_url);
        $this->program->delete();
        return redirect()->route('admin.program');
    }
    public function render()
    {
        return view('livewire.admin.program.edit');
    }
}