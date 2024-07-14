@extends('layout.client')
@section('content')
    <style>
        .video-js {
            position: absolute;
            width: 100%;
            height: 100%;
        }
    </style>

    <section class="courses-details-area pd-top-135 pd-bottom-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-course-wrap mb-0">
                        <div class="thumb"
                            style="position: relative;
                                width: 850px;
                                height: 390px;">
                            <video id="my-video" class="video-js" controls preload="auto" width="100%" height="100%"
                                poster="" data-setup="{}">
                                <source src="{{ $lesson->video->url }}" type="video/mp4" />
                                Trình duyệt không hỗ trợ
                            </video>
                        </div>
                        <div class="pt-3" style="display: flex; justify-content: space-between;">
                            <div>
                                @if ($prevLesson)
                                    <a style="width: 120px;" class="ps-5"
                                        href="{{ route('lesson.index', $prevLesson->slug) }}" class="fs-6 ">Bài trước</a>
                                @endif
                            </div>
                            <div>
                                @if ($nextLesson)
                                    <a style="width: 120px;"
                                        href="{{ route('lesson.index', $nextLesson->slug) }}"class="fs-6 ">Bài sau</a>
                                @endif
                            </div>
                        </div>


                        <div class="wrap-details">
                            <h5><a href="#">{{ $lesson->name }}</a></h5>

                            <div class="user-area">
                                <div class="user-details">
                                    <img src="{{ $course->teacher->image }}" style="width: 28px; height:28px"
                                        alt="img">
                                    <a href="#">{{ $course->teacher->name }}</a>
                                </div>
                                <div class="date ms-auto">
                                    <i class="fa fa-calendar-alt me-2" style="color: var(--main-color);"></i>Last updated
                                    9/2020
                                </div>
                                <div class="ms-auto">
                                    <i class="fa fa-user me-2" style="color: var(--main-color);"></i>5k lượt xem
                                </div>
                                <div class="user-rating">
                                    <span>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-alt"></i>
                                        4.9</span>(76)
                                </div>
                            </div>

                        </div>
                    </div>

                    @include('lessons::clients.part.tab')


                </div>
                @include('lessons::clients.part.aside')
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        videojs('my-video')
    </script>
@endsection
