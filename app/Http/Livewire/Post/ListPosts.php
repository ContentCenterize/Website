<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class ListPosts extends Component
{
    public $posts;

    public function render()
    {
        return view('livewire.post.list');
    }

    public function mount()
    {
        $this->posts = Post::all();
    }
}
