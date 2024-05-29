@extends('layout.backend')
@section('content')
    <p>
        <a href="{{ route('admin.course.index') }}" class="btn btn-info text-white">Quay lại khóa học</a>
        <a href="{{ route('admin.lesson.create',$id) }}" class="btn btn-primary">Thêm mới</a>
    </p>
    
    <table id="datatable" class="table table-bordered">
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

