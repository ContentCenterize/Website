<?php

namespace App\Http\Livewire\ThirdParty\Validation;

use App\Jobs\ThirdPartyValidation\HTML;
use App\Jobs\ThirdPartyValidation\Meta;
use App\Models\ThirdParty;
use App\Models\ThirdPartyValidation;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Carbon\Carbon;

class Show extends Component
{
    public $validation;
    public $thirdParty;
    public $validate_types;
    public $validate_type = 'HTML';

    public function render()
    {
        return view('livewire.third-party.validation.show');
    }

    protected $rules = [
        'validation.type' => 'required|in:DNS,HTML,Meta',
    ];

    public function mount(ThirdParty $thirdParty)
    {
        $this->thirdParty = $thirdParty;
        $this->validation = $thirdParty->validation()->first();
        if (is_null($this->validation)) {
            $this->validation = $thirdParty->validation()->create([
                'type' => 'HTML',
                'validate_string' => Str::random(50)
            ]);
        }

        $this->validate_types = Config::get('thirdparty.validation');
    }

    public function save()
    {
        $this->validate();

        $this->validation->save();
    }

    public function downloadHTML()
    {
        $html = view('third-party.validation.TEMPLATE.HTML', [
            'v_str' => $this->validation->validate_string
        ])->render();
        $filename = "hsuan-site-verification-" . substr(md5($this->validation->validate_string), 0, 10) . ".html";
        Storage::put($filename, $html);
        return response()->download(storage_path('app/' . $filename))->deleteFileAfterSend();
    }

    public function verify(ThirdPartyValidation $thirdPartyValidation)
    {
        switch ($thirdPartyValidation->type) {
            case 'HTML':
                HTML::dispatch($thirdPartyValidation);
                break;
            case 'Meta':
                Meta::dispatch($thirdPartyValidation);
                break;
            default:
        }

        session()->flash('message', '已送出驗證請求');
        return \Redirect::route('third-party-validation.show', $this->thirdParty);
    }
}
