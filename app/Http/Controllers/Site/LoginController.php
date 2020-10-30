<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Traits\ImageTrait;
use Auth ;

class LoginController extends Controller
{
    use ImageTrait ;
    public function  getLogin(){
       
        return view('site.login');
    }

    public function login(LoginRequest $request){

        $remember_me = $request->has('remember_me') ? 1 : 0;
        
        if (auth()->guard('web')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {

            return redirect() -> route('index');
        }
        session()->flash('error' , __('dashboard.finderrorindata'));
        return redirect()->back() ;
    } 

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('index');
    }
}
