<?php

namespace App\Livewire\Sponsor;

use App\Models\Sponsor;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public $name, $contact, $email, $description, $proposal_file;

    protected $rules = [
        'name' => 'required|min:3',
        'contact' => 'required|numeric|digits_between:10,13',
        'email' => 'required|email',
        'description' => 'required|min:10',
        'proposal_file' => 'nullable|mimes:pdf,doc,docx|max:5120',
    ];

    public function save()
    {
        $this->validate();

        $fileName = null;

        if ($this->proposal_file) {
            // 1. Simpan file ke storage (seperti biasa)
            $this->proposal_file->store('proposals', 'public');

            // 2. Ambil hanya nama filenya saja (hash name agar unik)
            $fileName = $this->proposal_file->hashName();

            // ATAU jika ingin nama asli file dari user:
            // $fileName = $this->proposal_file->getClientOriginalName();
        }

        Sponsor::create([
            'name' => $this->name,
            'contact' => $this->contact,
            'email' => $this->email,
            'description' => $this->description,
            'proposal_file' => $fileName,
        ]);

        $this->dispatch('swal', [
            'type'    => 'success',
            'title'   => 'Berhasil!',
            'message' => 'Terima kasih! Tim kami akan segera menghubungi Anda.'
        ]);
        $this->reset();
    }
    public function render()
    {
        return view('livewire.sponsor.form');
    }
}