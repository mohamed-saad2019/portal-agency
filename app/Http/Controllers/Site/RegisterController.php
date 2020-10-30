<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Traits\ImageTrait;
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

        User::create( [
            'username'      => $request->username           ,
            'email'         => $request->email              ,
            'password'      => bcrypt($request->password)   ,
            'img'           => $img                         ,

        ] );
        session()->flash('success' , __('site.successadduser'));
        return redirect( route('register') ) ;
    }
}
