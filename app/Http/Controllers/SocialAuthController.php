<?php

namespace App\Http\Controllers;

use SocialAuth;
use Illuminate\Http\Request;

class SocialAuthController extends Controller
{
    public function social($provider)
    {
        return SocialAuth::authorize($provider);
    }

    public function auth_callback($provider)
    {
        SocialAuth::login($provider, function($user,$details){

            // dd($details);

            $user->avatar = $details->avatar;
            $user->email = $details->email;
            $user->name = $details->nickname;
            $user->save();
        });

        return redirect('/home');
    }
}
