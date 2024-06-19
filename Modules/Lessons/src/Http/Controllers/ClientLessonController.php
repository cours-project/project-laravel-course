<?php
namespace Modules\Lessons\src\Http\Controllers;
use Modules\Categories\src\Repositories\CategoriesRepository;
use App\Http\Controllers\Controller;
use Modules\Courses\src\Repositories\CoursesRepositoryInterface;
use Modules\Lessons\src\Repositories\LessonsRepositoryInterface;

class ClientLessonController extends Controller{
     protected $courseRepository;
     protected $categoryRepository;
     protected $lessonRepository;

    public function __construct(
      CoursesRepositoryInterface $courseRepository , 
      CategoriesRepository $categoryRepository,
      LessonsRepositoryInterface $lessonRepository,
      ) 
      {
        $this->courseRepository = $courseRepository;
        $this->categoryRepository = $categoryRepository;
        $this->lessonRepository = $lessonRepository;
      }

    public function index($slug){
       $pageTitle = "Khóa học";
       $lesson = $this->lessonRepository->findBySlug($slug)->get()->first();
       $course = $this->courseRepository->courseOfLesson($lesson->course_id)->first();
       $lessons = $this->lessonRepository->getLessonByPosition($course)->where('status',1)->get();
      //  dd($lessons);
       $currentLesson = null;
       $document = $lesson->document()->get()->pluck('url')->first() ?: null;
      $index = 1;
      foreach ($lessons as $key => $item) {
        if($lesson->id == $item->id){
          $currentLesson = $key;
          break;
        }
      }
      $nextLesson = null;
      $prevLesson = null;
      if(isset($lessons[$currentLesson +1])){
        $nextLesson = $lessons[$currentLesson + 1];
      }
      if(isset($lessons[$currentLesson -1])){
        $prevLesson = $lessons[$currentLesson - 1];
      } 

      
      return view('lessons::clients.index',compact('index','pageTitle','lesson','course','nextLesson','prevLesson','document'));
    }
  }
    
  

  
