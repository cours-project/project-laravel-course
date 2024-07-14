
@extends('layout.client')
@section('content')
   <!-- breabcrumb Area Start-->
   
<!-- breabcrumb Area End -->

<div class="signin-area pd-top-130 pd-bottom-100">
   <h2 class="pt-5" style="text-align: center">Đăng nhập</h2>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <form action="{{ route('clients.login') }}" method="POST" class="single-signin-form-wrap">
                 @csrf
                    <div class="single-input-wrap">
                        <input name="email" type="email" placeholder="User Name" value="{{ old('email') }}">
                        @error('email')
                        <span style="color: #dc3545">
                            {{$message}}
                         </span>
                        @enderror
                    </div>
                  
                    <div class="single-input-wrap">
                        <input name="password" type="password" placeholder="Password" value="{{ old('password') }}">
                        @error('password')
                        <span style="color: #dc3545">
                            {{$message}}
                         </span>
                        @enderror
                    </div>
                    <div class="single-checkbox-inner">
                        <input type="checkbox" name="remember" value="1">
                        Remember me?
                    </div>
                    <div class="btn-wrap">
                        <button class="btn btn-base w-100">Signin Now</button>
                    </div>
                    <div class="bottom-content">
                        <a href="{{ route('clients.forgot.password') }}">Forgottem Your Password</a>
                        <a class="strong" href="{{ route('clients.pageRegister') }}">Signup</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection