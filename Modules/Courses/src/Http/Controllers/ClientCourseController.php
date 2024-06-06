<?php
namespace Modules\Courses\src\Http\Controllers;
use Modules\Categories\src\Repositories\CategoriesRepository;
use App\Http\Controllers\Controller;
use Modules\Courses\src\Repositories\CoursesRepositoryInterface;
use Modules\Lessons\src\Repositories\LessonsRepositoryInterface;

class ClientCourseController extends Controller{
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

    public function index(){
       $pageTitle = "Khóa học";
       $courses = $this->courseRepository->getCourses(config('paginate.limit'));
    //    dd($courses);
       return view('courses::clients.index',compact('pageTitle','courses'));
    }
    public function detail($slug){
      $pageTitle = "Chi tiết khóa học";
      $course = $this->courseRepository->courseDetail($slug)->first();

      return view('courses::clients.detail',compact('pageTitle','course'));
   }
   
   public function getTrialVideo($lesson_id){
      
      $lesson = $this->lessonRepository->getTrialVideo($lesson_id)->first();
      
      if (!$lesson) {
         return ['success' => false];
     }
     return ['success' => true, 'data' => $lesson];
      
   }

  

  
}