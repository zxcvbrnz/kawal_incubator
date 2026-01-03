<?php

namespace App\Livewire\Admin\Participant;

use App\Models\Participant;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;

class Detail extends Component
{
    use WithFileUploads;

    public Participant $participant;
    public $form = [];
    public $new_photo; // Properti untuk upload foto baru

    public function mount($id)
    {
        $this->participant = Participant::findOrFail($id);
        $this->form = $this->participant->toArray();

        $this->form['display'] = (bool) $this->form['display'];
        $this->form['status'] = (bool) $this->form['status'];
    }

    protected function rules()
    {
        return [
            // Identitas Utama
            'form.business_name' => 'required|string|min:3|max:255',
            'form.owner_name'    => 'required|string|max:255',
            'form.business_field' => 'required|string',
            'form.contact'       => 'required|numeric|digits_between:10,15',

            // Alamat
            'form.province'      => 'required|string',
            'form.city'          => 'required|string',
            'form.district'      => 'required|string',
            'form.village'       => 'required|string',
            'form.address_detail' => 'required|string|min:10',
            'form.postal_code'   => 'required|numeric|digits:5',

            // Operasional
            'form.omset'         => 'required|string',
            'form.market_reach'  => 'required|in:Lokal,Nasional,Ekspor',

            // Media Sosial
            'form.ig'            => 'nullable|string|max:50',
            'form.tiktok'        => 'nullable|string|max:50',
            'form.fb'            => 'nullable|string|max:50',
            'form.website'       => 'nullable|url',
            'form.wa'            => 'nullable|numeric|digits_between:10,15',

            // Inkubasi
            'form.has_incubated' => 'boolean',
            'form.incubation_institution' => 'required_if:form.has_incubated,true',
            'form.incubation_start'       => 'nullable|date',
            'form.incubation_end'         => 'nullable|date|after_or_equal:form.incubation_start',

            // Lainnya
            'form.description'   => 'nullable|string|min:20',
            'form.status'        => 'boolean',
            'form.display'        => 'boolean',

            // Validasi Foto
            'new_photo'          => 'nullable|image|max:2048', // Max 2MB
        ];
    }

    public function save()
    {
        $this->validate();

        // Cek jika ada upload foto baru
        if ($this->new_photo) {
            // Hapus foto lama jika ada
            if ($this->participant->profile_photo) {
                Storage::disk('public')->delete('participant/image/' . $this->participant->profile_photo);
            }

            // Simpan foto baru
            $filename = time() . '_' . $this->participant->id . '.' . $this->new_photo->getClientOriginalExtension();
            $this->new_photo->storeAs('participant/image', $filename, 'public');

            // Masukkan nama file ke array form
            $this->form['profile_photo'] = $filename;
        }

        $this->participant->update($this->form);
        $this->new_photo = null; // Reset input file

        $this->dispatch('swal', [
            'type'    => 'success',
            'title'   => 'Data Tersimpan!',
            'message' => 'Seluruh informasi partisipan berhasil diperbarui.'
        ]);
    }

    public function toggleDisplay()
    {
        $this->form['display'] = !$this->form['display'];
    }

    // #[On('delete')]
    // public function delete()
    // {
    //     // Hapus file fisik
    //     if ($this->participant->profile_photo) {
    //         Storage::disk('public')->delete('participant/image/' . $this->participant->profile_photo);
    //     }
    //     if ($this->participant->business_profile_file) {
    //         Storage::disk('public')->delete('participant/' . $this->participant->business_profile_file);
    //     }

    //     $this->participant->delete();
    //     return redirect()->route('dashboard')->with('success', 'Data partisipan telah dihapus.');
    // }

    public function render()
    {
        return view('livewire.admin.participant.detail');
    }
}