<ul class="course-tab nav nav-pills pd-top-100">
    <li class="nav-item">
      <button class="nav-link active" id="pill-1" data-bs-toggle="pill" data-bs-target="#pills-01" type="button" role="tab" aria-controls="pills-01" aria-selected="true">Tổng quan</button>
    </li>
    <li class="nav-item">
      <button class="nav-link" id="pill-2" data-bs-toggle="pill" data-bs-target="#pills-02" type="button" role="tab" aria-controls="pills-02" aria-selected="false">Thông tin giảng viên</button>
    </li>
    <li class="nav-item">
      <button class="nav-link" id="pill-3" data-bs-toggle="pill" data-bs-target="#pills-03" type="button" role="tab" aria-controls="pills-03" aria-selected="false">Đánh giá</button>
    </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-01" role="tabpanel" aria-labelledby="pill-1">
        <div class="overview-area">
            <h5>Course details</h5>
            <p>{!! $course->detail !!}
            </p>
            <div class="bg-gray">
                <h6>What Will I Learn?
                </h6>
                <div class="row">
                    <div class="col-md-6">
                        <ul>
                            <li><i class="fa fa-check"></i>Know how to configure Wordpress for best results
                            </li>
                            <li><i class="fa fa-check"></i>Understand plugins & themes and how to find/install them</li>
                            <li><i class="fa fa-check"></i>Protect their Wordpress website from hackers and spammers</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul>
                            <li><i class="fa fa-check"></i>Create a static homepage useful for most websites, or a blog like homepage useful for bloggers.</li>
                            <li><i class="fa fa-check"></i>Create an affiliate site for passive, recurring income
                            </li>
                            <li><i class="fa fa-check"></i>Create a Responsive Website that looks good on any browser.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <h6>Requirements</h6>
            <ul>
                <li><i class="fa fa-check"></i>No previous experience or software needed!
                </li>
                <li><i class="fa fa-check"></i>An open mind!</li>
            </ul>
            <h6 class="mt-5">Skills covered in this course
            </h6>
            <ul>
                <li><i class="fa fa-check"></i>This course is great for beginners who are still learning the financial markets.
                </li>
                <li><i class="fa fa-check"></i>This course is perfect for you if you are taking over an existing Wordpress website, or want to build one from scratch, but don't know where to start.</li>
                <li><i class="fa fa-check"></i>If you want to learn to master Wordpress without getting bogged down with technical jargon, this course is for you.
                </li>
            </ul>
           
        </div>
    </div>

    <div class="tab-pane fade" id="pills-02" role="tabpanel" aria-labelledby="pill-2">

        <div class="d-flex align-items-center">
            <div class="flex-shrink-0 me-4">
              <img src="{{ $course->teacher->image }}" class="rounded-circle" alt="..." style="width:200px;height:175px ">
            </div>
            <div class="flex-grow-1 ms-3">
              <p>Giảng viên</p>
              <p class="fs-3 text-dark fw-bold">{{ $course->teacher->name }}</p>
            </div>
          </div>

          <p class="mt-5">{!! $course->teacher->description !!}</p>



    </div>


    <div class="tab-pane fade" id="pills-03" role="tabpanel" aria-labelledby="pill-3">
        <div class="reviewers-area">
            <div class="row">
                <div class="col-lg-5">
                    <div class="media d-flex align-items-center">
                        <div class="thumb">
                            <img src="assets/img/author/01.png" alt="img">
                        </div>
                        <div class="media-body">
                            <h6>Jessica Jessy</h6>
                            <span>Product Designer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <p class="review-content">Great for the people that are willing to improve and learn. Please show up to the course with an open mind because the instructor got his own views and philosophy towards design that might challenge your own. This course will teach you...</p>
                </div>
            </div>
            <div class="meta-area d-flex">
                <div class="user-rating ms-0">
                    <span>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-alt"></i>
                    4.9</span>(76)
                </div>
                <div class="ms-auto">
                    <i class="fa fa-user me-2" style="color: var(--main-color);"></i>6794 students
                </div>
                <div class="ms-md-5 ms-auto mb-0">
                    <i class="far fa-user me-2" style="color: var(--main-color);"></i>6794 students
                </div>
            </div>
        </div>

    </div>
</div>