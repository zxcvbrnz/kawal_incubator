<?php

namespace App\Livewire\Admin\Product;

use App\Models\Participant;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public Product $product; // Model Binding
    public $name, $participant_id, $display, $image; // Form properties
    public $old_image;

    public function mount($id)
    {
        $product = Product::findOrFail($id);

        $this->product = $product;
        $this->name = $product->name;
        $this->participant_id = $product->participant_id;
        $this->display = $product->display;
        $this->old_image = $product->image_url;
    }

    public function update()
    {
        $rules = [
            'name' => 'required|min:3|max:255',
            'participant_id' => 'required|exists:participants,id',
            'display' => 'boolean',
            'image' => 'nullable|image|max:2048',
        ];

        $this->validate($rules);

        $data = [
            'name' => $this->name,
            'participant_id' => $this->participant_id,
            'display' => $this->display,
        ];

        // Jika ada gambar baru yang diupload
        if ($this->image) {
            // Hapus gambar lama dari storage
            if ($this->old_image) {
                Storage::disk('public')->delete('product/' . $this->old_image);
            }

            // Simpan gambar baru
            $imageName = time() . '.' . $this->image->extension();
            $this->image->storeAs('product', $imageName, 'public');
            $data['image_url'] = $imageName;
        }

        $this->product->update($data);
        $this->dispatch('swal', [
            'type'    => 'success',
            'title'   => 'Berhasil!',
            'message' => 'Produk berhasil diperbarui.'
        ]);
    }

    public function delete()
    {
        // Hapus file dari storage
        if ($this->product->image_url) {
            Storage::disk('public')->delete('product/' . $this->product->image_url);
        }

        $this->product->delete();

        session()->flash('success', 'Produk telah dihapus selamanya.');
        return redirect()->route('admin.product');
    }
    public function render()
    {
        return view('livewire.admin.product.edit', [
            'participants' => Participant::orderBy('business_name')->get()
        ]);
    }
}