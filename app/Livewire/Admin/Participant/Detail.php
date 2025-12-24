<?php

namespace App\Livewire\Admin\Participant;

use App\Models\Participant;
use Livewire\Component;
use Livewire\WithFileUploads;

class Detail extends Component
{
    use WithFileUploads;

    public Participant $participant;
    public $form = [];

    public function mount($id)
    {
        $this->participant = Participant::findOrFail($id);
        $this->form = $this->participant->toArray();
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

            // Media Sosial (Nullable tapi validasi format)
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
        ];
    }

    public function save()
    {
        $this->validate();

        $this->participant->update($this->form);

        $this->dispatch('swal', [
            'type'    => 'success',
            'title'   => 'Data Tersimpan!',
            'message' => 'Seluruh informasi partisipan berhasil diperbarui.'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.participant.detail');
    }
}
