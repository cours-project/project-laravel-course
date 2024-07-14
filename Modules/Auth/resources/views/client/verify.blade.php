@extends('layout.client')
@section('content')
<div class="signin-area pd-top-130 pd-bottom-100" style="text-align: center">
<h2> Xác minh email để xem bài học </h2>
<h6> <a href="">Xác minh ngay tại đây</a></h6>
<form action="{{ route('verification.send') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary">Gửi lại email</button>
</form>
</div>

@endsection