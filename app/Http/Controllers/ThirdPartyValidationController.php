<?php

namespace App\Http\Controllers;

use App\Models\ThirdParty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ThirdPartyValidationController extends Controller
{
    public function show(ThirdParty $thirdparty){

        if(!auth()->user()->third_parties->contains($thirdparty)){
            abort(403);
        }

        return view('third-party.validation.show')->with('thirdParty', $thirdparty);
    }
}
