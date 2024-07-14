@extends('layout.client')
@section('content')
<!-- breabcrumb Area End -->

<div class="signin-area pd-top-130 pd-bottom-100">
    <h2 style="text-align: center">Please Sign Up Here</h2>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <form class="single-signin-form-wrap" action="{{ route('clients.register')}}" method="POST">
                    @csrf
                    <div class="single-input-wrap">
                        <input type="text" name="name" placeholder="Họ Tên" value="{{ old('name') }}">
                        @error('name')
                        <span style="color: #dc3545">
                            {{$message}}
                         </span>
                        @enderror
                    </div>
                    <div class="single-input-wrap">
                        <input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                        @error('email')
                        <span style="color: #dc3545">
                            {{$message}}
                         </span>
                        @enderror
                    </div>
                    <div class="single-input-wrap">
                        <input type="password" name="password" placeholder="Mật khẩu" value="{{ old('password') }}">
                        @error('password')
                        <span style="color: #dc3545">
                            {{$message}}
                         </span>
                        @enderror
                    </div>
                    <div class="single-input-wrap">
                        <input type="password" name="confirm_password" placeholder="Xác nhận mật khẩu">
                        @error('confirm_password')
                        <span style="color: #dc3545">
                            {{$message}}
                         </span>
                        @enderror
                    </div>
                    <div class="btn-wrap">
                        <button class="btn btn-base w-100">SignUp Now</button>
                    </div>
                    <div class="bottom-content">
                        <a href="#">Forgottem Your Password</a>
                        <a class="strong" href="{{ route('clients.pageLogin') }}">Signin</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection