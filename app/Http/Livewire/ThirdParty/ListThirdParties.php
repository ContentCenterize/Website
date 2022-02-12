<?php

namespace App\Http\Livewire\ThirdParty;

use App\Models\Post;
use App\Models\ThirdParty;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListThirdParties extends Component
{
    public $third_parties;
    public function render()
    {
        return view('livewire.third-party.list-third-parties');
    }

    public function mount(){
        $user = Auth::user();
        if($user->can('read_all_third_parties')){
            $this->third_parties = ThirdParty::all();
        } else{
            $this->third_parties = $user->third_parties()->get();
        }
    }

}
