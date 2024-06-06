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
     
       return view('lessons::clients.index',compact('pageTitle','lesson'));
    }

  

  
}