@extends('layout.backend')
@section('content')
{{-- @if (section('msg'))
    <div class="alert alert-success">{{ session('msg') }}</div>
@endif --}}
<a href="{{ route('admin.teacher.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Thêm mới</a>
</div>
<div class="row">
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Tên</th>
                    <th>Kinh nghiệm</th>
    
                    <th>Thời gian</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Ảnh</th>
                    <th>Tên</th>
                    <th>Kinh nghiệm</th>
    
                    <th>Thời gian</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </tfoot>
      
        </table>
    </div>
</div>
</div>
@endsection

@section('script')
    <script>
//         $('#dataTable').DataTable({
//     ajax: '{{ route("admin.user.data") }}',
// } );


$(document).ready(function () {
            $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.teacher.data') }}",
                columns:[{
                        data: 'image',
                    },
                    {
                        data: 'name',
                    },
                    {
                        data: 'exp',
                    },

                    {
                        data: 'created_at',
                    },
                    {
                        data: 'edit',
                    },
                    {
                        data: 'delete',
                    }
                ]
            });
            });
       
       
    </script>
@endsection