<?php
namespace Modules\Lessons\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Courses\src\Repositories\CoursesRepositoryInterface;

class LessonsController extends Controller{
    
    protected $courseRepository;
    public function __construct(CoursesRepositoryInterface $courseRepository) {
        $this->courseRepository = $courseRepository;
    }

    public function index($id){
    $course = $this->courseRepository->find($id)->pluck('name')->first();
    $pageTitle = "Danh sách bài giảng : $course";
      return view('lessons::litst', compact('pageTitle'));
    }
    
    public function data(){

    }

    public function create(){
        
    }

    // public function store(LessonsRequest $request){

    // }


    public function edit($id){

    }

    // public function update(LessonsRequest $request,$id){

    // }

    public function delete($id){
        
    }
}
  

  