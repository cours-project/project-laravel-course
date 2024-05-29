
@extends('layouts.auth')
@section('content')
<div class="col-xl-10 col-lg-12 col-md-9">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-6 d-none d-lg-block bg-login-image">
                    <img style="width: 530px; height:550px" src="https://static.vecteezy.com/system/resources/previews/005/879/539/original/cloud-computing-modern-flat-concept-for-web-banner-design-man-enters-password-and-login-to-access-cloud-storage-for-uploading-and-processing-files-illustration-with-isolated-people-scene-free-vector.jpg" alt="">
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">{{ $titlePage }}</h1>
                        </div>
                        <form action="{{ route('admin.login') }}" method="post" class="user">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-user"
                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                    placeholder="Email...">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name='password' class="form-control form-control-user"
                                    id="exampleInputPassword" placeholder="Password...">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                    <label class="custom-control-label" for="customCheck">Nhớ mật khẩu</label>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                               Đăng nhập
                            </button>
                            <hr>
                            <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Đăng nhập bằng Google
                            </a>
                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Đăng nhập bằng Facebook
                            </a>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Quên mật khẩu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection