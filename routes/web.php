<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/auth/redirect', function () {
    return Socialite::driver('keycloak')->redirect();
})->name('auth.redirect');

Route::get('/auth/callback', function () {
    $hsuanUser = Socialite::driver('keycloak')->user();
    //dd($hsuanUser);

    $user = User::where('hsuan_id', $hsuanUser->id)->orWhere('email', $hsuanUser->email)->first();

    if ($user) {
        $user->update([
            'hsuan_token' => $hsuanUser->token,
            'hsuan_refresh_token' => $hsuanUser->refreshToken,
        ]);
    } else {
        $user = User::create([
            'name' => $hsuanUser->name,
            'email' => $hsuanUser->email,
            'hsuan_id' => $hsuanUser->id,
            'hsuan_token' => $hsuanUser->token,
            'hsuan_refresh_token' => $hsuanUser->refreshToken,
        ]);
    }

    Auth::login($user);

    return redirect(route('dashboard'));
})->name('auth.callback');
