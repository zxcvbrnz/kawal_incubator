<?php

namespace App\Livewire\Admin\News;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public Post $post;
    public $title, $content, $new_image;

    public function mount($id)
    {
        $this->post = Post::findOrFail($id);
        $this->title = $this->post->title;
        $this->content = $this->post->content;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|min:5|max:255',
            'content' => 'required',
            'new_image' => 'nullable|image|max:2048',
        ]);

        $data = ['title' => $this->title, 'content' => $this->content];

        if ($this->new_image) {
            Storage::disk('public')->delete('new/' . $this->post->image_url);
            $name = time() . '.' . $this->new_image->extension();
            $this->new_image->storeAs('new', $name, 'public');
            $data['image_url'] = $name;
        }

        $this->post->update($data);
        $this->dispatch('swal', [
            'type'    => 'success',
            'title'   => 'Berhasil!',
            'message' => 'Cerita berhasil diperbarui.'
        ]);
    }

    #[On('delete')]

    public function delete()
    {
        Storage::disk('public')->delete('new/' . $this->post->image_url);
        $this->post->delete();
        session()->flash('success', 'Cerita berhasil dihapus!');
        return redirect()->route('admin.news');
    }
    public function render()
    {
        return view('livewire.admin.news.edit');
    }
}