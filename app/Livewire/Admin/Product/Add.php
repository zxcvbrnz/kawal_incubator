<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Add extends Component
{
    use WithFileUploads;
    public $name, $image, $participant_id, $display = false;

    public function save()
    {
        $this->validate([
            'name' => 'required|min:3|max:255',
            'image' => 'required|image|max:2048',
            'display' => 'boolean',
            'participant_id' => 'required|exists:participants,id',
        ]);

        $imageName = time() . '.' . $this->image->extension();
        $this->image->storeAs('product', $imageName, 'public');

        Product::create([
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
        return view('livewire.admin.product.add');
    }
}