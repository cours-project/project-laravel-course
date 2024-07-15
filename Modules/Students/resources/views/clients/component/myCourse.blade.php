<div class="col-lg-8">
    <div class="card mb-4">
        <div class="card-body">
            <div class="col-lg-12">
                <form action="">
                    <div class="row">
                    <div class="col-lg-4">
                        <select style="height: 40px" name="teacher_id" class="filter_teacherId" id="">
                            <option value="0">Tìm kiếm giảng viênn của bạn</option>
                            @foreach ($uniqueTeachers as $key => $teacher)
                                <option {{ request()->teacher_id == $key ? 'selected' : '' }} value="{{ $key }}">{{ $teacher }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <input class="filter-keyword ms-3" name="keyword" type="text" placeholder="Tìm kiếm ..." value="{{ request()->keyword }}">
                    </div>
                    <div class="col-lg-2">filter-btn
                    <button type="submit" class="">Gửi</button>
                    </div>
                </div>
                </form>
            </div>
            <section class="trending-courses-area pt-3 pd-bottom-130">
                <div class="container">
                    <div class="row">
                        @forelse ($courses as $course)
                            <div class="col-lg-6">
                                <div class="single-course-wrap">
                                    <div class="thumb">

                                        <a href="{{ route('course.detail', $course->slug) }}" class="cat cat-blue">0
                                            view</a>
                                        <img src="{{ asset($course->thumbnail) }}" alt="img">
                                    </div>
                                    <div class="wrap-details">
                                        <h6><a
                                                href="{{ route('course.detail', $course->slug) }}">{{ $course->name }}</a>
                                        </h6>
                                        <div class="user-area">
                                            <div class="user-details">
                                                <img style="width: 25px;height:28px"
                                                    src="{{ asset($course->teacher->image) }}" alt="img">
                                                <a href="#">{{ $course->teacher->name }}</a>
                                            </div>
                                            <div class="user-rating">
                                                <span><i class="fa fa-star"></i>
                                                    4.9</span>(76)
                                            </div>
                                        </div>
                                        <div class="price-wrap">
                                            <div class="row align-items-center">
                                                <div class="col-4">
                                                    <a href="#">{{ getCategoriesOfCourse($course->id) }}</a>
                                                </div>
                                                <div class="col-8 text-end mb-2">
                                                    <div class="btn" style="background-color:rgb(0,113,220)">Vào học
                                                        ngay</div>
                                                </div>

                                                {{-- <div class="col-5">
                                                    {{ getHours($course->durations) }}
                                                </div> --}}
                                                {{-- <div class="col-7 text-end">
                                                    <a href="#">

                                                        {{ (string) countModule($course) }}



                                                        chương / {{ (string) countLesson($course) }} bài</a>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                          
                        @empty
                            Chưa có khóa học
                        @endforelse


                    </div>
                    <div class="col-lg-12 text-center">
                        <nav aria-label="Page navigation example">
                            {{ $courses->links() }}
                          </nav>
                        </div>
                </div>
               
            </section>
            
        </div>
    </div>
</div>
