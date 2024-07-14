@extends('layout.client')
@section('content')
<div class="signin-area pd-top-100 pd-bottom-50" style="text-align: center">
    <h2>Tài khoản</h2>
</div>
<section style="background-color: #eee;">
    <div class="container py-5 ">
      <div class="row">
       @include('students::clients.component.side')

       @include('students::clients.component.'.$content)
       
      </div>
    </div>
  </section>

@endsection