@extends('layout.backend')
@section('content')
<form action="{{ route('admin.user.update',$user->id) }}" method="POST">
   @csrf
   <div class="row">
      
      <div class="col-6">
         <div class="mb-3">
            <label for="">Tên</label>
            <input type="text" name="name" class="form-control {{$errors->has('name')?'is-invalid':''}}" placeholder="Tên..." value="{{ old('name') ?? $user->name }}">
            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                 </div>
                @enderror
         </div>
      </div>

      <div class="col-6">
         <div class="mb-3">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control {{$errors->has('email')?'is-invalid':''}}" placeholder="Email..." value="{{ old('email') ?? $user->email }}">
            @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                 </div>
                @enderror
         </div>
      </div>

      <div class="col-6">
         <div class="mb-3">
            <label for="">Nhóm</label>
            <select name="group_id" id="" class="form-control {{$errors->has('group_id')?'is-invalid':''}}">
               <option value="">Chon nhom</option>
               <option value="1">Admin</option>
            </select>
            @error('group_id')
            <div class="invalid-feedback">
                {{$message}}
             </div>
            @enderror
         </div>
      </div>

      <div class="col-6">
         <div class="mb-3">
            <label for="">Mật khẩu</label>
            <input type="password" name="password" class="form-control {{$errors->has('password')?'is-invalid':''}}" placeholder="Mật khẩu...">
            @error('password')
            <div class="invalid-feedback">
                {{$message}}
             </div>
            @enderror
         </div>
      </div>
      <div class="p-3">
      <button type="submit" class="btn btn-primary ps-3 float-end" >Thêm mới</button>
      </div>
   </div>
</form>
@endsection