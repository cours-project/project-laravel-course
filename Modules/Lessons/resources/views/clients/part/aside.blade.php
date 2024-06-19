<div class="col-lg-4 sidebar-area">
    <div class="widget widget-accordion-inner">
        <h5 class="widget-title border-0">Course Syllabus</h5>
        <div class="accordion" id="accordionExample">

        @if ($course->lessons->whereNull('parent_id'))
            @foreach (getModuleByPosition($course) as $key => $module)   
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $module->id }}" aria-expanded="true" aria-controls="collapse{{ $module->id }}">
                    {{ $module->name }}
                </button>
              </h2>
              
              <div id="collapse{{ $module->id }}" class="accordion-collapse collapse {{ $module->id == $lesson->parent_id ? 'show' : '' }}" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <ul>
                     @if ($course->lessons->where('parent_id', $module->id) )
                     @foreach ($course->lessons->where('parent_id', $module->id)->where('status',1) as $lesson)
                     <li>
                      <a  class="play-btn ' . $margin . '" href="#"><i class="fa fa-play"></i></a>
                      <span>
                          <div class="row" style="width:350px">
                          <a class="col-9" href="{{ route('lesson.index',$lesson->slug) }}"> <div > <p>Bài {{ $index++ }}: {{ $lesson->name }}</p>  </div></a>
                          </div>
                          <span>{{ getTime($lesson->durations)}} </span> 
                      </span>
                      </li>
                     @endforeach
                     @endif
                    
                    </ul>                                    
                </div>
              </div>
            </div>
        @endforeach
        @endif
        </div> 
    </div>

</div>