<?php
namespace Modules\Lessons\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Courses\src\Repositories\CoursesRepositoryInterface;
use Modules\Lessons\src\Http\Requests\LessonRequest;
use Modules\Lessons\src\Repositories\LessonsRepositoryInterface;
use Modules\Videos\src\Repositories\VideosRepositoryInterface;

class LessonsController extends Controller{
    
    protected $courseRepository;
    protected $lessonRepository;
    protected $videoRepository;


    public function __construct(CoursesRepositoryInterface $courseRepository  , VideosRepositoryInterface $videoRepository , LessonsRepositoryInterface $lessonRepository) {
        $this->courseRepository = $courseRepository;
        $this->lessonRepository = $lessonRepository;
        $this->videoRepository = $videoRepository;

    }

    public function index($id){
    $course = $this->courseRepository->find($id)->pluck('name')->first();
    $pageTitle = "Danh sách bài giảng : $course";
      return view('lessons::lists', compact('pageTitle','id'));
    }
    
    public function data(){

    }

    public function create($id){
        $pageTitle = "Thêm mới bài giảng";

        return view('lessons::create',compact('pageTitle','id'));
    }

    public function store(LessonRequest $request){
      $url = $request->video;
      $result = $this->videoRepository->createVideo(['url' => $url]);
      dd($result);
    }


    public function edit($id){

    }

    // public function update(LessonsRequest $request,$id){

    // }

    public function delete($id){
        
    }
}
  

  