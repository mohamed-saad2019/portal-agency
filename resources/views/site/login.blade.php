@extends('layouts.site')
@section('content')

<div class="container-login100" style='background-image: url("{{ asset('assets/front/bg-01.jpg') }}")'>
    <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
        <div style="text-align: center;">
                <img style="height:50px;width:50px" src="{{ asset('storage/app/public/images/logo.png') }}" >
        </div>
        @if( session()->has('success'))
        <div class="alert alert-success">
                {{session()->get('success')}}
        </div>
        @endif
        <div>
            @if (Session::has('error'))
                <p style="color:red;text-align: center">{{ Session::get('error') }}</p>
            @endif
        </div>
        <form class="login100-form validate-form flex-sb flex-w" action="{{route('login')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="">
                    <span class="txt1">
                        <b>{{__('site.email')}}</b>
                    </span>
                    <div class="wrap-input100 validate-input" data-validate = "email is required">
                        <input class="input100" type="text" name="email" value="{{old('email')}}" style="width:280px">
                        <span class="focus-input100"></span>
                    </div>
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
            </div>

            <div class="">
                <span class="txt1">
                <b>{{__('site.password')}}</b>
                </span>						
                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="password" style="width:280px">
                    <span class="focus-input100"></span>
                </div>
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div style="display:flex;">
                <input type="checkbox" name="remember_me" id="remember-me"
                                            class="chk-remember">
                &nbsp;&nbsp;&nbsp;
                {{__('site.remember-me')}}
            </div>
                
            <div class="container-login100-form-btn m-t-17">
                <button class="login100-form-btn" style="width:280px">
                {{__('site.login')}}
                </button>
            </div>
            
        </form>
        <div class="container-login100-form-btn m-t-17">
            <button class="login100-form-btn" style="background-color:royalblue;width:280px">
            <a href="{{route('redirect')}}" style="color:seashell">
                <i class="fa fa-facebook-f" style="padding:5px"></i>
                {{__('site.loginfacebook')}}
            </a>
            </button>
        <br/><br/><br/><br/>
        </div>
    </div>
</div>
	
@endsection








