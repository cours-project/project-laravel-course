@extends('layout.backend')
@section('content')
    <p>
        <a href="{{ route('admin.course.index', $id) }}" class="btn btn-info text-white">Quay lại khóa học</a>
        <a href="{{ route('admin.lesson.sort' , $id) }}" class="btn btn-success">Sắp xếp</a>
        <a href="{{ route('admin.lesson.create', $id) }}" class="btn btn-primary">Thêm mới</a>
    </p>
    
    <table id="myTable" class="table table-bordered">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Học thử</th>
                <th>Lượt xem</th>
                <th>Thời lượng</th>
                <th>Thêm</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Tên</th>
                <th>Học thử</th>
                <th>Lượt xem</th>
                <th>Thời lượng</th>
                <th>Thêm</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </tfoot>

    </table>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 2,
                ajax: "{{ route('admin.lesson.data', $id) }}",
                columns: [
                    {
                        data: 'name',
                    },
                    {
                        data: 'is_trial',
                    },
                    {
                        data: 'view',
                    },
                    {
                        data: 'durations',
                    },
                    {
                        data: 'add',
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

