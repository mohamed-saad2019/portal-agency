<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite ;

class SocialeController extends Controller
{
    
    public function redirectToProvider(){

        return Socialite::driver('facebook')->redirect();
        
        
    }

    public function handleProviderCallback(){
       
        $user = Socialite::driver('facebook')->stateless()->user() ;
        return response()->json($user);
        // return Socialite::driver('facebook')->stateless()->user();
        // $user->token;
    }

    
    
}
