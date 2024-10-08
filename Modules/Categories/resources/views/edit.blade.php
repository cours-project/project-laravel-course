@extends('layout.backend')
@section('content')
<form action="{{ route('admin.category.update',$getCataId->id) }}" method="POST">
   @csrf
   <div class="row">
      
      <div class="col-6">
         <div class="mb-3">
            <label for="">Tên</label>
            <input type="text" name="name" class="form-control {{$errors->has('name')?'is-invalid':''}}" placeholder="Tên..." value="{{ old('name') ?? $getCataId->name }}">
            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                 </div>
                @enderror
         </div>
      </div>

      {{-- <div class="col-6">
         <div class="mb-3">
            <label for="">Slug</label>
            <input type="text" name="slug" class="form-control {{$errors->has('slug')?'is-invalid':''}}" placeholder="Slug..." value="{{ old('slug') ?? $categories->slug }}">
            @error('slug')
                <div class="invalid-feedback">
                    {{$message}}
                 </div>
                @enderror
         </div>
      </div> --}}

      <div class="col-6">
         <div class="mb-3">
            <label for="">Cha</label>
            <select name="parent_id" id="{{ $getCataId->id }}" class="form-control {{$errors->has('parent_id')?'is-invalid':''}}">
               <option value="0">none</option>
               {{ getCategories($allCata) }}
               
            </select>
            @error('parent_id')
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