<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    // google social login function
    public function googleLogin()
    {
       return Socialite::driver('google')->redirect();
    }

    // google call back function
    public function googleCallBack()
    {
        try {
            $google_user = Socialite::driver('google')->user();
            $user = User::where('google_id',$google_user->getId())->first();
            if(!$user){
                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    // 'name' => $google_user->name,
                    // 'email' => $google_user->email,
                    // 'google_id' => $google_user->id,
                ]);
                Auth::login($new_user);
                return redirect()->intended('dashboard');
            }else{
                Auth::login($user);
                return redirect()->intended('dashboard');
            }

        } catch (\Throwable $th) {
            //throw $th;
            dd("Something went wrong! ".$th->getMessage());
        }
    }
}
