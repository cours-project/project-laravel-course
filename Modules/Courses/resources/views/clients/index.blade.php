@extends('layout.client')

@section('content')

        <!-- navbar start -->
      @include('courses::clients.component.nav')
        <!-- navbar end -->

    <!-- breabcrumb Area Start-->
    <section class="breadcrumb-area" style="background-color: #F9FAFD;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 align-self-center">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Courses</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Development</li>
                    </ul>
                    <h2>Development Course</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- breabcrumb Area End -->

    <!-- trending courses Area Start-->
    <section class="trending-courses-area pd-top-135 pd-bottom-130">
        <div class="container">
            <div class="row">
           @forelse ($courses as $course)
           <div class="col-lg-3">
            <div class="single-course-wrap">
                <div class="thumb">
                    
                    <a href="{{ route('course.detail',$course->slug) }}" class="cat cat-blue">0 view</a>
                    <img src="{{ asset($course->thumbnail) }}" alt="img">
                </div>
                <div class="wrap-details">
                    <h6><a href="{{ route('course.detail',$course->slug) }}">{{ $course->name }}</a></h6>
                    <div class="user-area">
                        <div class="user-details">
                            <img style="width: 25px;height:28px" src="{{ asset($course->teacher->image) }}" alt="img">
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
                            @if ($course->sale_price)
                            <div class="col-4 text-end">
                                <div class="price" style=" text-decoration: line-through; ">{{ formatPrice($course->price) }} </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="price">{{ formatPrice($course->sale_price) }} </div>
                            </div>
                            @else<div class="col-8 text-end">
                                <div class="price">{{ formatPrice($course->price) }} </div>
                            </div>
                            @endif
                            <div class="col-5">
                                {{ getHours($course->durations) }}
                            </div>
                            <div class="col-7 text-end">
                                <a href="#">
                                 
                                        {{ (string)countModule($course)}}
                                    
                                    
                                     
                                    chương /   {{ (string)countLesson($course)}} bài</a>
                            </div>

                            
                          
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
           @empty
               Chưa có khóa học  
           @endforelse
                
                <div class="col-lg-12 text-center">
                    <nav aria-label="Page navigation example">
                        {{ $courses->links() }}
                      </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- trending courses Area End -->

@endsection