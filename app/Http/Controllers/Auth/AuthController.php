<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function redirectToProvider_facebook() {
        return \Laravel\Socialite\Facades\Socialite::driver('facebook')->redirect();
    }
    
    public function handleProviderCallback_facebook() {
        $socialUser = \Socialite::driver('facebook')->user(); 
        
        
        $data = [
          'facebook_id' => $socialUser->getId(),
          'name' => $socialUser->name,
          'email' => $socialUser->getEmail(),
        ];
        
        $user = User::where('facebook_id', $data['facebook_id'])->first();
        
        if (is_null($user)){
            $user = new User($data);
            $user->save();
        }
        
        Auth::login($user, true);
        return redirect('/');
    }
}
