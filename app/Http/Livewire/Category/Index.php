<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class Index extends Component
{
    public $categories;
    public function render()
    {
        return view('livewire.category.index');
    }

    public function mount(){
        $this->categories = Category::all();
    }
}
