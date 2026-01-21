<?php

namespace App\Livewire\Admin\Video;

use App\Models\VideoPelajaran;
use Livewire\Component;
use Livewire\Attributes\On;


class Edit extends Component
{
    public $videoId, $judul, $type, $link_video, $deskripsi;

    /**
     * Menginisialisasi data saat halaman dimuat
     */
    public function mount($id)
    {
        $video = VideoPelajaran::findOrFail($id);

        $this->videoId    = $video->id;
        $this->judul      = $video->judul;
        $this->type       = $video->type;
        $this->link_video = $video->link_video;
        $this->deskripsi  = $video->deskripsi;
    }

    /**
     * Aturan validasi
     */
    protected function rules()
    {
        return [
            'judul'      => 'required|min:5|max:255',
            'type'       => 'required|in:youtube,gdrive,embed',
            'link_video' => 'required',
            'deskripsi'  => 'nullable|min:10',
        ];
    }

    /**
     * Update data ke database
     */
    public function update()
    {
        $this->validate();

        $video = VideoPelajaran::findOrFail($this->videoId);

        $video->update([
            'judul'      => $this->judul,
            'type'       => $this->type,
            'link_video' => $this->link_video,
            'deskripsi'  => $this->deskripsi,
        ]);

        session()->flash('success', 'Materi video berhasil diperbarui!');

        return redirect()->route('admin.video');
    }

    /**
     * Hapus video secara permanen
     */
    #[On('delete')]
    public function delete()
    {
        $video = VideoPelajaran::findOrFail($this->videoId);
        $video->delete();

        session()->flash('success', 'Video telah dihapus dari sistem.');

        return redirect()->route('admin.video');
    }

    public function render()
    {
        return view('livewire.admin.video.edit');
    }
}