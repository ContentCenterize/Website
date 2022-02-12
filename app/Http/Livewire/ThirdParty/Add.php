<?php

namespace App\Http\Livewire\ThirdParty;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Livewire\Component;

class Add extends Component
{
    public $base_url;
    public $types;
    public $type = 'blogger';
    public $description;

    public $rules = [
        'base_url' => 'required|url'
    ];

    public function render()
    {
        return view('livewire.third-party.add');
    }

    public function mount(){
        $this->types = Config::get('thirdparty.all');
    }

    public function add(){
        //dd((array) $this);
        Auth::user()->third_parties()->create((array) $this);

        return \Redirect::route('third-parties.index');
    }
}
