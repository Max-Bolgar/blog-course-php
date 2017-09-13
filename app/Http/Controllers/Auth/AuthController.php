<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;
use Illuminate\Http\Request;
use \Laravel\Socialite\Facades\Socialite as Socialite;

class AuthController extends Controller
{
    public function redirectToProvider_facebook() {
        return Socialite::driver('facebook')->redirect();
    }
    
    public function redirectToProvider_twitter() {
        return Socialite::driver('twitter')->redirect();
    }
    
    public function handleProviderCallback_facebook() {
        $socialUser = Socialite::driver('facebook')->user(); 
        
        
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
    
    public function handleProviderCallback_twitter() {
        $socialUser = \Socialite::driver('twitter')->user(); 
        
        
        $data = [
          'twitter_id' => $socialUser->getId(),
          'name' => $socialUser->name,
          'email' => $socialUser->getEmail(),
        ];
        
        $user = User::where('twitter_id', $data['twitter_id'])->first();
        
        if (is_null($user)){
            $user = new User($data);
            $user->save();
        }
        
        Auth::login($user, true);
        return redirect('/');
    }
}
