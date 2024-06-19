<ul class="course-tab nav nav-pills pd-top-100">
    <li class="nav-item">
        <button class="nav-link active" id="pill-1" data-bs-toggle="pill" data-bs-target="#pills-01" type="button"
            role="tab" aria-controls="pills-01" aria-selected="true">Mô tả bài
            học</button>
    </li>
    <li class="nav-item">
        <button class="nav-link" id="pill-2" data-bs-toggle="pill" data-bs-target="#pills-02" type="button"
            role="tab" aria-controls="pills-02" aria-selected="false">Tài
            liệu</button>
    </li>
    <li class="nav-item">
        <button class="nav-link" id="pill-3" data-bs-toggle="pill" data-bs-target="#pills-03" type="button"
            role="tab" aria-controls="pills-03" aria-selected="false">Đặt câu
            hỏi</button>
    </li>
</ul>


<div class="tab-content" id="pills-tabContent">

    <div class="tab-pane fade show active" id="pills-01" role="tabpanel" aria-labelledby="pill-1">
        <div class="overview-area">
            @if ($lesson->description)
                {!! $lesson->description !!}
            @else
                Mô tả trống !
            @endif
            <hr>
        </div>
    </div>


    <div class="tab-pane fade" id="pills-02" role="tabpanel" aria-labelledby="pill-2">

        @if ($lesson->document)
            <div class="center">
                Xem tài liệu bài: <a class="badge bg-secondary" href="{{ $document }}">{{ $lesson->name }}</a>
            </div>
        @else
            Tài liệu trống
        @endif
        <hr>
    </div>
    <div class="tab-pane fade" id="pills-03" role="tabpanel" aria-labelledby="pill-2">
        cha la ai
        <hr>
    </div>
</div>
