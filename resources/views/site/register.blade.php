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
        <form class="login100-form validate-form flex-sb flex-w" action="{{route('singup')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="co-md-6">
                    <span class="txt1">
                        <b>{{__('site.username')}}</b>
                    </span>
                    <div class="wrap-input100 validate-input" data-validate = "username is required">
                        <input class="input100" type="text" name="username" value="{{old('username')}}" >
                        <span class="focus-input100"></span>
                    </div>
                    @error('username')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div class="co-md-6">
                    <span class="txt1">
                        <b>{{__('site.email')}}</b>
                    </span>
                    <div class="wrap-input100 validate-input" data-validate = "email is required">
                        <input class="input100" type="text" name="email" value="{{old('email')}}" >
                        <span class="focus-input100"></span>
                    </div>
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                </div>
   
            
            <div class="form-group">
                <div class="co-md-6">
                    <span class="txt1">
                    <b>{{__('site.password')}}</b>
                    </span>						
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="password" >
                        <span class="focus-input100"></span>
                    </div>
                    @error('password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <br>
                <div class="co-md-6">
                    <span class="txt1">
                    <b>{{__('site.img')}}</b>
                    </span>						
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="" type="file" name="img" >
                        <span class="focus-input100"></span>
                    </div>
                    @error('img')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            
            </div>
            
            <div class="container-login100-form-btn m-t-17">
                <button class="login100-form-btn">
                {{__('site.signin')}}
                </button>
            <br/><br/><br/><br/>
            </div>
        </form>
    </div>
</div>
	
@endsection








