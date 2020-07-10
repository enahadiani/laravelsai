<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite;
use App\SocialiteUser;
class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    
    public function callback($provider)
    {
        
        $getInfo = Socialite::driver($provider)->user();
        
        $user = $this->createUser($getInfo,$provider);
        
        auth()->login($user);
        
        return redirect()->to('/home');
        
    }

    function createUser($getInfo,$provider){
        if(is_int($getInfo->id)){
            $id = str_val($getInfo->id);
        }else{
            $id = $getInfo->id;
        }
        $user = SocialiteUser::where('provider_id', $id)->first();
        
        if (!$user) {
            $user = SocialiteUser::create([
                'name'     => $getInfo->name,
                'email'    => $getInfo->email,
                'provider' => $provider,
                'provider_id' => $id
            ]);
        }
        
        return $user;
    }
        
}
