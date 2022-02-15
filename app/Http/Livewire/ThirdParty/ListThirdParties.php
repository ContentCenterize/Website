<?php

namespace App\Http\Livewire\ThirdParty;

use App\Jobs\SyncPost;
use App\Models\Post;
use App\Models\ThirdParty;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ListThirdParties extends Component
{
    public $third_parties;
    public $confirmText;
    public function render()
    {
        return view('livewire.third-party.list-third-parties');
    }

    public function mount()
    {
        $user = Auth::user();
        if ($user->can('read_all_third_parties')) {
            $this->third_parties = ThirdParty::all();
        } else {
            $this->third_parties = $user->third_parties()->get();
        }
    }

    public function delete($id)
    {
        $user = Auth::user();
        $tp = ThirdParty::find($id);
        if ($user->third_parties()->get()->contains($tp)) {
            $tp->delete();
            return Redirect::route('third-parties.index');
        } else {
            session()->flash('message', '刪除失敗');
        }
        return Redirect::route('third-parties.index');
    }

    public function sync($id){
        SyncPost::dispatch(ThirdParty::find($id));
        Session::flash('message-type', 'warning');
        session()->flash('message', "已送出同步處理請求，請見通知欄查看結果");
        return Redirect::route('third-parties.index');
    }

    public function verify($id){
        if(Gate::check('edit_third_party_verified')){
            ThirdParty::find($id)->first()->update([
                'verified' => true
            ]);
            Session::flash('message-type', 'warning');
            session()->flash('message', "已驗證");
            return Redirect::route('third-parties.index');
        } else {
            abort(403);
        }
    }
}
