@extends('layout.backend')
@section('content')
{{-- @if (section('msg'))
    <div class="alert alert-success">{{ session('msg') }}</div>
@endif --}}
<a href="{{ route('admin.course.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Thêm mới</a>
</div>
<div class="row">
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Trạng thái</th>
                    <th>Thời gian</th>
                    <th>Bài giảng</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Trạng thái</th>
                    <th>Thời gian</th>
                    <th>Bài giảng</th>
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

$(document).ready(function () {
console.log(1111);
$('#myTable').DataTable({
    processing: true,
    serverSide: true,
    pageLength: 5,
    ajax: "{{ route('admin.course.data') }}",
    columns: [{
                        data: 'name',
                    },
                    {
                        data: 'price',
                    },
                    {
                        data: 'status',
                    },

                    {
                        data: 'created_at',
                    },
                    {
                        data: 'code',
                    },
                    {
                        data: 'lesson',
                    },
                    {
                        data: 'edit',
                    },
                    {
                        data: 'delete',
                    }
                ]
})
});
</script>

@endsection