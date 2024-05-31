@extends('layout.backend')
@section('content')

<form action="{{ route('admin.lesson.handleSort',$id) }}" method="post">
    @csrf
    @method('post')

    <div id="sortable-list" class="list-group mb-3">
        @foreach ($modules as $module)
            <div id="item-{{ $module->id }}" data-id="{{ $module->id }}" class="list-group-item title text-white bg-primary">
                {{ $module->name }}
                <input type="text" name="lesson[]" value="{{ $module->id }}">
            </div>
            @if ($module->children)
                @php
                    $lessons = $module->children()->orderBy('position', 'asc')->get();
                @endphp
                @foreach ($lessons as $lesson)
                    <div id="item-{{ $lesson->id }}" data-id="{{ $lesson->id }}" class="list-group-item children">
                        {{ $lesson->name }}
                        <input type="hidden" name="lesson[]" value="{{ $lesson->id }}">
                    </div>
                @endforeach
            @endif
        @endforeach
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Lưu lại</button>
        <a href="" class="btn btn-danger">Hủy</a>
    </div>
</form>
@endsection

@section('style')
    <style>
        .ghost {
            opacity: 0.4;
        }

        .list-group {
            margin-bottom: 20px;
        }

        .children {
            padding-left: 30px;
        }

        .title {
            font-weight: bold;
        }
    </style>
@endsection
@section('script')
    <script>
        $('#sortable-list').sortable();
    </script>
@endsection