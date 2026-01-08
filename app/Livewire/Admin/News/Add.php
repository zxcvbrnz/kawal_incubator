<?php

namespace App\Livewire\Admin\News;

use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Add extends Component
{
    use WithFileUploads;

    public $title, $content, $image;

    public function save()
    {
        $this->validate([
            // Menambahkan regex untuk mencegah simbol URL Reserved
            // i = Case Insensitive
            'title' => [
                'required',
                'min:5',
                'max:255',
                'regex:/^[^?\/#&"\'<>]+$/u'
            ],
            'content' => 'required',
            'image' => 'required|image|max:2048',
        ], [
            // Custom message agar user paham kenapa error
            'title.regex' => 'Judul tidak boleh mengandung simbol khusus seperti / , ? , # , & , atau tanda kutip.',
        ]);

        $imageName = time() . '.' . $this->image->extension();
        $this->image->storeAs('new', $imageName, 'public');

        Post::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'content' => $this->content,
            'image_url' => $imageName,
        ]);

        session()->flash('success', 'Cerita berhasil ditambahkan!');
        return redirect()->route('admin.news');
    }

    public function render()
    {
        return view('livewire.admin.news.add');
    }
}