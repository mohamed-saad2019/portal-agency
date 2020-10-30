<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Mail\SendMail;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Traits\ImageTrait;
use finfo;
use Mail;

class RegisterController extends Controller
{
    use ImageTrait ;

    public function register()
    {
        return view('site.register');
    }

    public function singup(RegisterRequest $request)
    {
        $img =  $this->handel_img($request->img , 'profiles')  ;
        $key = rand(1000,9999) ;

        Mail::To($request->email)->send( new SendMail($key)) ;

        $user = User::create( [
            'username'      => $request->username           ,
            'email'         => $request->email              ,
            'password'      => bcrypt($request->password)   ,
            'img'           => $img                         ,
            'email_key'     => $key 

        ] );

        // session()->flash('success' , __('site.successadduser'));
        return redirect( route('getConfirm',$user->id) ) ;
    }


    public function getConfirm($id)
    {
        $user = User::find($id);
        $email = $user->email ;
        return view('site.confirm' , compact('id','email')) ;
    }

    public function setConfirm(Request $request,$id)
    {
       
        $check = User::where('email_key',$request->code)->where('id',$id)->first() ;
        if($check)
        {
            User::where('id',$id)->update(['email_key' => null, 'email_verified' => 1]);
            session()->flash('success' , __('site.successadduser'));
            return redirect( route('register') ) ;
        }
        else{
            session()->flash('error' , __('site.errorcode'));
            return redirect()->back() ;
        }
        
    }
}
