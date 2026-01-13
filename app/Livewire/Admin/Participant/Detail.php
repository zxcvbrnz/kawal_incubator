<?php

namespace App\Livewire\Admin\Participant;

use App\Models\Participant;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;

class Detail extends Component
{
    use WithFileUploads;

    public Participant $participant;
    public $form = [];
    public $new_photo;
    public $new_pdf;

    public function mount($id)
    {
        $this->participant = Participant::findOrFail($id);
        $this->form = $this->participant->toArray();

        $this->form['incubation_start'] = $this->participant->incubation_start
            ? Carbon::parse($this->participant->incubation_start)->format('Y-m-d')
            : null;

        $this->form['incubation_end'] = $this->participant->incubation_end
            ? Carbon::parse($this->participant->incubation_end)->format('Y-m-d')
            : null;

        $this->form['display'] = (bool) $this->form['display'];
        $this->form['status'] = (bool) $this->form['status'];
    }

    protected function rules()
    {
        return [
            'form.business_name' => 'required|string|min:3|max:255',
            'form.owner_name'    => 'required|string|max:255',
            'form.business_field' => 'required|string',
            'form.contact'       => 'required|numeric|digits_between:10,15',
            'form.province'      => 'required|string|max:255',
            'form.city'          => 'required|string|max:255',
            'form.district'      => 'required|string|max:255',
            'form.village'       => 'required|string|max:255',
            'form.address_detail' => 'required|string|max:255',
            'form.postal_code'   => 'required|numeric|digits:5',
            'form.omset'         => 'required|string|max:255',
            'form.market_reach'  => 'required|string|max:255',
            'form.ig'            => 'nullable|string|max:50',
            'form.tiktok'        => 'nullable|string|max:50',
            'form.fb'            => 'nullable|string|max:50',
            'form.website'       => 'nullable|string|max:50',
            'form.wa'            => 'nullable|string|max:50',
            'form.has_incubated' => 'boolean',
            'form.incubation_institution' => 'required_if:has_incubated,true|nullable|string|max:255',
            'form.incubation_start'       => 'required_if:has_incubated,true|nullable|date',
            'form.incubation_end'         => 'required_if:has_incubated,true|nullable|date|after_or_equal:incubation_start',
            'form.description'   => 'nullable|string',
            'form.status'        => 'boolean',
            'form.display'       => 'boolean',
            'form.legalitas'     => 'nullable|string',
            'form.legalitas_other' => 'nullable|string',
            'form.certification'   => 'nullable|string',
            'form.certification_other' => 'nullable|string',
            'new_photo'          => 'nullable|image|max:2048',
            'new_pdf'            => 'nullable|mimes:pdf|max:5120',
        ];
    }

    public function save()
    {
        $this->validate();

        // Foto Profil
        if ($this->new_photo) {
            if ($this->participant->profile_photo) {
                Storage::disk('public')->delete('participant/image/' . $this->participant->profile_photo);
            }
            $filename = time() . '_photo.' . $this->new_photo->getClientOriginalExtension();
            $this->new_photo->storeAs('participant/image', $filename, 'public');
            $this->form['profile_photo'] = $filename;
        }

        // Berkas PDF
        if ($this->new_pdf) {
            if ($this->participant->business_profile_file) {
                Storage::disk('public')->delete('participant/' . $this->participant->business_profile_file);
            }
            $pdfName = time() . '_profile.pdf';
            $this->new_pdf->storeAs('participant', $pdfName, 'public');
            $this->form['business_profile_file'] = $pdfName;
        }

        $this->participant->update($this->form);
        $this->reset(['new_photo', 'new_pdf']);
        $this->participant = $this->participant->fresh();

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

    #[On('delete')]
    public function delete($data)
    {
        $password = $data['password'] ?? null;

        // Verifikasi Password Admin
        if (!$password || !Hash::check($password, Auth::user()->password)) {
            $this->dispatch('swal', [
                'type'    => 'error',
                'title'   => 'Akses Ditolak!',
                'message' => 'Password admin salah. Penghapusan dibatalkan.'
            ]);
            return;
        }

        if ($this->participant->profile_photo) {
            Storage::disk('public')->delete('participant/image/' . $this->participant->profile_photo);
        }
        if ($this->participant->business_profile_file) {
            Storage::disk('public')->delete('participant/' . $this->participant->business_profile_file);
        }

        $this->participant->delete();
        return redirect()->route('dashboard')->with('success', 'Data partisipan telah dihapus.');
    }

    public function render()
    {
        return view('livewire.admin.participant.detail');
    }
}