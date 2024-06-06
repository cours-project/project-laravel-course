<div class="col-lg-4 sidebar-area">
    <div class="widget widget-accordion-inner">
        <h5 class="widget-title border-0">Course Syllabus</h5>
        <div class="accordion" id="accordionExample">
       
        @if ($course->lessons->whereNull('parent_id'))
            @foreach (getModuleByPosition($course) as $key => $module)   
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $module->id }}" aria-expanded="true" aria-controls="collapse{{ $module->id }}">
                    {{ $module->name }}
                </button>
              </h2>
              <div id="collapse{{ $module->id }}" class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <ul>
                     @if ($course->lessons->where('parent_id', $module->id))
                     {{ getLessonsClient($course->lessons,$module->id) }}
                     @endif
                    
                    </ul>                                    
                </div>
              </div>
            </div>
        @endforeach
        @endif
        </div> 
    </div>

    <div class="widget widget-course-details mb-0">
        <h5 class="widget-title">Course Details</h5>
        <ul>
            <li>Tên khóa học: <span>{{ $course->name }}</span></li>
            <li>Danh mục: <span> <a href="">{{ getCategoriesOfCourse($course->id) }}</a></span></li>
            <li>Số giờ học: <span> {{ getHours($course->durations) }}</span></li>
            <li>Số chương: <span>  {{ (string)countModule($course)}} chương</span></li>
            <li>Số bài học: <span>  {{ (string)countLesson($course)}} bài</span></li>
            <li>Tài liệu đi kèm: <span>{{ $course->is_document == 1 ? 'Có' : 'Không' }}</span></li>
            <li>Hỗ trợ 1v1 : <span>{{ $course->supports }}</span></li>
        </ul> 
    </div>
</div>