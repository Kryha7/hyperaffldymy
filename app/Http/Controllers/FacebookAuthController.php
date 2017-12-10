<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\SocialiteServiceProvider;
use Socialite;

class FacebookAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(SocialiteServiceProvider $provider)
    {
        $user = $provider->createOrGetUser(Socialite::driver('facebook')->user());
        auth()->login($user);
        return redirect()->to('/home');
    }
}
