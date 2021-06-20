<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Socialite;

class OAuthController extends Controller
{   
    use ApiResponser;

    public function __construct() {
        config([
            'services.google.redirect' => route('oauth.callback', 'google'),
        ]);
    }

    public function redirect($provider) {
        $data = ['url' => Socialite::driver($provider)->stateless()->redirect()->getTargetUrl()];
        return $this->success('Generated login url', 201, $data);
    }

    public function handleCallback($provider) {
        $user = Socialite::driver($provider)->stateless()->user();
        $userExists = User::where('email', '=', $user->email)->first();
        if(!$userExists) {
            $userExists = [
                'name' => $user->name,
                'email' => $user->email,
                'password' => bcrypt('||==||'.$user->email.'-secret'),
                'oauth_id' => $user->id,
                'oauth_type' => $provider
            ];
            $userExists = User::create($userExists);
        }

        $token = $userExists->createToken('moaj-token', ['server:update'])->plainTextToken;
        $data = [
            'user' => $userExists,
            'token' => explode("|", $token)[1]
        ];

        return view('oauth.callback', $data);
    }
}
