@extends('layout.client')
<style>.modal-body {
    padding: 0;
    margin: 0;
}

.video-js {
    width: 100% !important; /* Chỉ sử dụng !important nếu cần thiết */
    height: 100% !important; /* Chỉ sử dụng !important nếu cần thiết */
}</style>
@section('content')
 <!-- courses-details Area Start-->
 <section class="courses-details-area pd-top-135 pd-bottom-130">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-course-wrap mb-0">
                    <div class="thumb">
                        
                        <img src="{{ asset($course->thumbnail) }}"  alt="img">
                    </div>
                    <div class="wrap-details">
                        <h5><a href="#">{{ $course->name }}</a></h5>
                        <p>Learn Python like a Professional Start from the basics and go all the way to creating your own applications and games</p>
                        <div class="user-area">
                            <div class="user-details">
                                <img src="{{ asset($course->teacher->image) }}" style="width: 35px;height:35px" alt="img">
                                <a href="#">{{ $course->teacher->name }}</a>
                            </div>

                            <div class="ms-auto">
                                <i class="fa fa-user me-2" style="color: var(--main-color);"></i>Giảng viên {{ $course->teacher->exp }} năm kinh nghiệm 
                            </div>

                            <div class="date ms-auto">
                                <i class="fa fa-calendar-alt me-2" style="color: var(--main-color);"></i>{{ $course->is_document == 1 ? 'Có tài liệu hỗ trợ khóa học' : 'Không kèm tài liệu khóa học' }}
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
                        <div class="buying-wrap d-flex align-items-center">
                            <h2 class="price d-inline-block mb-0">{{ formatPrice($course->sale_price) }}</h2>
                            <a class="btn btn-base ms-auto" href="#">Add to Cart</a>
                            <a class="btn btn-base-light ms-3" href="#">Buy Now</a>
                            <div class="ms-auto d-425-none">
                                <a href="#"><i class="far fa-heart"></i></a>
                                <a class="ms-4" href="#"><i class="fa fa-share me-2"></i>share</a>
                            </div>
                        </div>
                    </div>
                </div>

    
  
  <!-- Modal -->
  <div class="modal fade mt-5" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content" style="margin: auto !important">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
        @include('courses::clients.part.tab_detail')

            </div>
          @include('courses::clients.part.aside_detail')
        </div>

    </div>

  

</section>
<!-- courses-details Area End -->

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('.is_trial').on('click', function(e) {
                e.preventDefault();
                const id = $(this).data("id");
                console.log(id);
                const modalElm = $('#modal');
                const modal = new bootstrap.Modal(modalElm);

              

                const url = "{{ route('course.data.trial', ":id") }}" 
                const route = url.replace(':id', id)
                $(this).text('Đang mở..')
                fetch(route).then((response) => {
                    return response.json()
                }).then((data) => {
                    
                    if(data.success != true){
                        alert ('Video không tồn tại')
                        return ;
                    }
                    if(data.data.is_trial != 1){
                        alert('Không được phép học thử')
                        return;
                    }
                    modal.show();
                    $('.modal-title').text(data.data.name)
                    $('.modal-body').html(`
                        <video
                            id="my-video"
                            class="video-js"
                            controls
                            preload="auto"
                            width="100%"
                            height="100%"
                            poster="MY_VIDEO_POSTER.jpg"
                            data-setup="{}"
                        >
                            <source src="${data.data.video.url}" type="video/mp4" />
                            Your browser does not support the video tag.
                        </video>
                    `);

                }).finally(() => {
                    $(this).text('Học thử')
                    videojs('my-video')
                })
            })

            $('#modal').on('hidden.bs.modal', function(e) {
            $('.modal-title').text('');
            $('.modal-body').html('');
            
});

});
    </script>
@endsection
