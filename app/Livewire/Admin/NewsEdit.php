<?php

namespace App\Livewire\Admin;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewsEdit extends Component
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
        $this->validate(['title' => 'required', 'content' => 'required']);

        $data = ['title' => $this->title, 'content' => $this->content];

        if ($this->new_image) {
            Storage::disk('public')->delete('new/' . $this->post->image_url);
            $name = time() . '.' . $this->new_image->extension();
            $this->new_image->storeAs('posts', $name, 'public');
            $data['image_url'] = $name;
        }

        $this->post->update($data);
        return redirect()->route('admin.post');
    }

    public function delete()
    {
        Storage::disk('public')->delete('new/' . $this->post->image_url);
        $this->post->delete();
        return redirect()->route('admin.post');
    }
    public function render()
    {
        return view('livewire.admin.news-edit');
    }
}