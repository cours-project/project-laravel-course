@extends('layout.client')
@section('content')
<section class="courses-details-area pd-top-135 pd-bottom-130">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-course-wrap mb-0">
                    <div class="thumb">
                        <a class="play-btn" href="#"><i class="fa fa-play"></i></a>
                        <img src="assets/img/course/video.png" alt="img">
                    </div>
                    <div class="wrap-details">
                        <h5><a href="#">{{ $lesson->name }}</a></h5>
                      
                        <div class="user-area">
                            <div class="user-details">
                                <img src="assets/img/author/1.png" alt="img">
                                <a href="#">Jessica Jessy</a>
                            </div>
                            <div class="date ms-auto">
                                <i class="fa fa-calendar-alt me-2" style="color: var(--main-color);"></i>Last updated 9/2020
                            </div>
                            <div class="ms-auto">
                                <i class="fa fa-user me-2" style="color: var(--main-color);"></i>5k already enrolled
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
                <ul class="course-tab nav nav-pills pd-top-100">
                    <li class="nav-item">
                      <button class="nav-link active" id="pill-1" data-bs-toggle="pill" data-bs-target="#pills-01" type="button" role="tab" aria-controls="pills-01" aria-selected="true"></button>
                    </li>
                    <li class="nav-item">
                      <button class="nav-link" id="pill-2" data-bs-toggle="pill" data-bs-target="#pills-02" type="button" role="tab" aria-controls="pills-02" aria-selected="false">Exercise Files</button>
                    </li>
                    <li class="nav-item">
                      <button class="nav-link" id="pill-3" data-bs-toggle="pill" data-bs-target="#pills-03" type="button" role="tab" aria-controls="pills-03" aria-selected="false">Reviews</button>
                    </li>
                </ul>
            
            </div>
            <div class="col-lg-4 sidebar-area">
                <div class="widget widget-accordion-inner">
                    <h5 class="widget-title border-0">Course Syllabus</h5>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Introduction
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                    <li>
                                        <a class="play-btn" href="#"><i class="fa fa-play"></i></a>
                                        <span>
                                            <p>Welcome to strategic thinking</p>
                                            <span>1m 24s</span>
                                        </span>
                                    </li>
                                </ul>                                    
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                1. Setting the Stage for Strategic
                                Thinking
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                    <li>
                                        <i class="fa fa-lock"></i>
                                        <span>
                                            <p>Embrace the strategic thinking mindset</p>
                                            <span>1m 24s</span>
                                        </span>
                                    </li>
                                    <li>
                                        <i class="fa fa-lock"></i>
                                        <span>
                                            <p>Strategy: Not just for corporations
                                            </p>
                                            <span>1m 24s</span>
                                        </span>
                                    </li>
                                    <li>
                                        <i class="fa fa-lock"></i>
                                        <span>
                                            <p>The sequence of strategy
                                            </p>
                                            <span>1m 24s</span>
                                        </span>
                                    </li>
                                </ul> 
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                2. Developing Your Strategic Thinking
                            </button>
                          </h2>
                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                    <li>
                                        <i class="fa fa-lock"></i>
                                        <span>
                                            <p>Embrace the strategic thinking mindset</p>
                                            <span>1m 24s</span>
                                        </span>
                                    </li>
                                    <li>
                                        <i class="fa fa-lock"></i>
                                        <span>
                                            <p>Strategy: Not just for corporations
                                            </p>
                                            <span>1m 24s</span>
                                        </span>
                                    </li>
                                    <li>
                                        <i class="fa fa-lock"></i>
                                        <span>
                                            <p>The sequence of strategy
                                            </p>
                                            <span>1m 24s</span>
                                        </span>
                                    </li>
                                </ul> 
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                3. Implementing Strategic Thinking
                              </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                  <ul>
                                      <li>
                                          <i class="fa fa-lock"></i>
                                          <span>
                                              <p>Embrace the strategic thinking mindset</p>
                                              <span>1m 24s</span>
                                          </span>
                                      </li>
                                      <li>
                                          <i class="fa fa-lock"></i>
                                          <span>
                                              <p>Strategy: Not just for corporations
                                              </p>
                                              <span>1m 24s</span>
                                          </span>
                                      </li>
                                      <li>
                                          <i class="fa fa-lock"></i>
                                          <span>
                                              <p>The sequence of strategy
                                              </p>
                                              <span>1m 24s</span>
                                          </span>
                                      </li>
                                  </ul> 
                              </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                4. Collaborating, Sharing, and Exporting
                              </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                  <ul>
                                      <li>
                                          <i class="fa fa-lock"></i>
                                          <span>
                                              <p>Embrace the strategic thinking mindset</p>
                                              <span>1m 24s</span>
                                          </span>
                                      </li>
                                      <li>
                                          <i class="fa fa-lock"></i>
                                          <span>
                                              <p>Strategy: Not just for corporations
                                              </p>
                                              <span>1m 24s</span>
                                          </span>
                                      </li>
                                      <li>
                                          <i class="fa fa-lock"></i>
                                          <span>
                                              <p>The sequence of strategy
                                              </p>
                                              <span>1m 24s</span>
                                          </span>
                                      </li>
                                  </ul> 
                              </div>
                            </div>
                        </div>
                    </div> 
                </div>
                
            </div>
        </div>
    </div>
</section>
@endsection