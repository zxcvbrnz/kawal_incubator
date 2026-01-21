<?php

namespace App\Livewire\Admin\Video;

use App\Models\VideoPelajaran;
use Livewire\Component;
use Livewire\WithFileUploads;

class Add extends Component
{
    use WithFileUploads;

    public $judul, $type = 'youtube', $link_video, $deskripsi;

    protected $rules = [
        'judul' => 'required|min:5|max:255',
        'type' => 'required|in:youtube,gdrive,embed',
        'link_video' => 'required',
        'deskripsi' => 'nullable|max:2000',
    ];

    public function store()
    {
        $this->validate();

        VideoPelajaran::create([
            'judul' => $this->judul,
            'type' => $this->type,
            'link_video' => $this->link_video,
            'deskripsi' => $this->deskripsi,
        ]);

        session()->flash('success', 'Materi video berhasil diterbitkan ke perpustakaan.');

        return redirect()->route('admin.video');
    }

    public function render()
    {
        return view('livewire.admin.video.add');
    }
}