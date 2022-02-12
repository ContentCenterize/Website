<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostPreview extends Component
{
    public $posts;
    public function render()
    {
        return view('livewire.dashboard.post-preview');
    }

    public function mount()
    {
        $user = Auth::user();
        if($user->can('read_all_posts')){
            $this->posts = Post::all();
        } else{
            $this->posts = $user->posts;
        }
    }
}
