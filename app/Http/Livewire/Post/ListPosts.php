<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();
        if ($user->can('read_all_posts')) {
            $this->posts = Post::all();
        } else {
            $this->posts = $user->posts;
        }
    }

    public function toggleVisible($id)
    {
        $post = Post::find($id)->first();
        $post->update([
            'visible' => !$post->visible
        ]);
        session()->flash('message', "已更改{$post->title}狀態");
        return \Redirect::route('posts.index');
    }
}
