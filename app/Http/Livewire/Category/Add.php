<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class Add extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.category.add');
    }

    public function add()
    {
        Category::create([
            'name' => $this->name
        ]);
        return \Redirect::route('category.index');
    }
}
