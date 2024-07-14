
@extends('layout.client')
@section('content')
   <!-- breabcrumb Area Start-->
   
<!-- breabcrumb Area End -->

<div class="signin-area pd-top-130 pd-bottom-100">
   <h2 class="pt-5" style="text-align: center">Lấy lại mật khẩu</h2>
    <p style="text-align: center" >( Nhập email tài khoản của bạn để lấy lại mật khẩu )</p>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <form action="{{ route('password.email') }}" method="POST" class="single-signin-form-wrap">
                 @csrf
                    <div class="single-input-wrap">
                        <input name="email" type="email" placeholder="Your email" value="{{ old('email') }}">
                        @error('email')
                        <span style="color: #dc3545">
                            {{$message}}
                         </span>
                        @enderror
                    </div>
                    <div class="btn-wrap">
                        <button class="btn btn-base w-100">Xác nhận</button>
                    </div>
                    <div class="bottom-content">
                        <a href="{{ route('clients.login') }}">Quay lại đăng nhập</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection