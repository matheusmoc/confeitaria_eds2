<?php

namespace App\Http\Controllers\Bakery;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Redirect,Response,File;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Hash;
class SocialController extends Controller
{
  
public function redirect()
{
    return Socialite::driver('google')->redirect();
}

public function callback()
{
    
    try {
        $user = Socialite::driver('google')->user();
       
        // Check Users Email If Already There
        $is_user = User::where('email', $user->getEmail())->first();
        if(!$is_user){

            $saveUser = User::updateOrCreate([
                'google_id' => $user->getId(),
            ],[
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => Hash::make($user->getName().'@'.$user->getId())
            ]);
        }else{
            $saveUser = User::where('email',  $user->getEmail())->update([
                'google_id' => $user->getId(),
            ]);
            $saveUser = User::where('email', $user->getEmail())->first();
        }


        Auth::loginUsingId($saveUser->id);

        return redirect()->route('index');
    } catch (\Throwable $th) {
        throw $th;
    }

   }
   public function logOut(){
      Auth::logout();
        return redirect()->back();
   }

}
