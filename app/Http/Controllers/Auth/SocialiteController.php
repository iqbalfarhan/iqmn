<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect(){
        return Socialite::driver('github')->redirect();
    }

    public function callback(){
        $githubUser = Socialite::driver('github')->user();

        // dd($githubUser->avatar);

        $user = User::updateOrCreate([
            'email' => $githubUser->email,
        ], [
            'name' => $githubUser->name ?? $githubUser->nickname,
            'github_id' => $githubUser->id,
            'github_token' => $githubUser->token,
            'photo' => $githubUser->avatar ?? null
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }
}
