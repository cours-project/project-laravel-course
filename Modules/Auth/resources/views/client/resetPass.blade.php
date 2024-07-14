
@extends('layout.client')
@section('content')
   <!-- breabcrumb Area Start-->
   
<!-- breabcrumb Area End -->

<div class="signin-area pd-top-130 pd-bottom-100">
   <h2 class="pt-5" style="text-align: center">Tạo mật khẩu mới</h2>
    <p style="text-align: center" >( Xác minh mật khẩu để tiếp tục )</p>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <form action="{{ route('password.update') }}" method="POST" class="single-signin-form-wrap">
                 @csrf
                    <div class="single-input-wrap">
                        <input name="password" type="password" placeholder="Mật khẩu mới" value="{{ old('password') }}">
                        @error('password')
                        <span style="color: #dc3545">
                            {{$message}}
                         </span>
                        @enderror
                    </div>
                    <div class="single-input-wrap">
                        <input name="confirm_password" type="password" placeholder="Xác minh mật khẩu" value="{{ old('confirm_password') }}">
                        @error('confirm_password')
                        <span style="color: #dc3545">
                            {{$message}}
                         </span>
                        @enderror
                    </div>
                    <input type="hidden" name='token' value="{{ $_token }}">
                    <input type="hidden" name='email' value="{{ request()->email }}">

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