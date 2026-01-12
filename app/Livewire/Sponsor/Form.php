<?php

namespace App\Livewire\Sponsor;

use App\Models\Sponsor;
use Livewire\Component;
use Livewire\WithFileUploads;
use Silvanix\Wablas\Message;

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
            $this->proposal_file->store('proposals', 'public');
            $fileName = $this->proposal_file->hashName();
        }

        Sponsor::create([
            'name' => $this->name,
            'contact' => $this->contact,
            'email' => $this->email,
            'description' => $this->description,
            'proposal_file' => $fileName,
        ]);

        $send = new Message();

        // Pesan disesuaikan dengan data Sponsor
        $waData = [
            [
                'phone' => $this->contact,
                'message' => "Halo *{$this->name}*\n\nTerima kasih telah mengajukan penawaran sponsorship. Proposal Anda telah kami terima dan sedang dalam tahap review oleh tim kami.\n\nKami akan segera menghubungi Anda kembali.\n\nwww.kawalincubator.com",
            ],
            [
                'phone' => '089691884833',
                'message' => "Halo *Admin*\n\nTerdapat pengajuan *SPONSOR* baru.\n\nInstansi: {$this->name}\nEmail: {$this->email}\nDeskripsi: {$this->description}\n\nCek dashboard admin untuk detailnya.\nwww.kawalincubator.com",
            ],
            [
                'phone' => '085103326061',
                'message' => "Halo *Admin*\n\nTerdapat pengajuan *SPONSOR* baru.\n\nInstansi: {$this->name}\nEmail: {$this->email}\n\nwww.kawalincubator.com",
            ],
        ];

        foreach ($waData as $singleWa) {
            // Tetap menggunakan multiple_text sesuai struktur awal Anda
            $send->multiple_text([$singleWa]);

            // Jeda 10 - 20 detik per pesan
            sleep(rand(5, 10));
        }

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