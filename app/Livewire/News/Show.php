<?php

namespace App\Livewire\News;

use App\Models\Post;
use Livewire\Component;

class Show extends Component
{
    public $post;

    public function mount($slug)
    {
        $this->post = Post::where('slug', $slug)->firstOrFail();
        if (!$this->post) {
            abort(response()->view('errors.404-news', [], 404));
        }
    }
    public function render()
    {
        return view('livewire.news.show', [
            'recentPosts' => Post::where('id', '!=', $this->post->id)->latest()->take(5)->get()
        ]);
    }
}