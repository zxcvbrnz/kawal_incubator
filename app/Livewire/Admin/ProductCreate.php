<?php

namespace App\Livewire\Admin;

use App\Models\Product as ModelsProduct;

use Livewire\Component;
use Livewire\WithFileUploads;

class ProductCreate extends Component
{
    use WithFileUploads;
    public $name, $image, $participant_id, $display = false;

    public function save()
    {
        $this->validate([
            'name' => 'required|min:3',
            'image' => 'required|image|max:1024',
            'participant_id' => 'required|exists:participants,id',
        ]);

        $imageName = time() . '.' . $this->image->extension();
        $this->image->storeAs('product', $imageName, 'public');

        ModelsProduct::create([
            'name' => $this->name,
            'image_url' => $imageName,
            'participant_id' => $this->participant_id,
            'display' => $this->display,
        ]);
        session()->flash('success', 'Produk berhasil dibuat!');
        return redirect()->route('admin.product');
    }
    public function render()
    {
        return view('livewire.admin.product-create');
    }
}