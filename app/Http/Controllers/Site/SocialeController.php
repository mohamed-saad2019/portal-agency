<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite ;
use Auth ;

class SocialeController extends Controller
{
    
    public function redirectToProvider(){

        return Socialite::driver('facebook')->redirect();
        
        
    }

    public function handleProviderCallback(){
       
        try {

            $user = Socialite::driver('facebook')->user() ;

            $check = User::where('sevice_id',$user->id)->first();
            if($check)
            {
                $data = User::where('sevice_id',$user->id)->update(['token' => $user->token, 'email_verified' => 1]);
                Auth::loginUsingId($check->id);

            }else{
                $_user = User::create( [
                    'username'      => $user->name ,
                    'email'         => $user->email,
                    'email_verified'=> 1 ,
                    'sevice_id'     => $user->id,
                    'token'         => $user->token
        
                ] );
                Auth::loginUsingId($_user->id);
            }
            return redirect()->back() ;
        }catch (\Exception $e) {
            return redirect(route('redirect'));
        }
        
        
        
    }

    
    
}
