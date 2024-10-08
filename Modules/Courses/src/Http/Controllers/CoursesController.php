<?php
namespace Modules\Courses\src\Http\Controllers;
use Modules\Courses\src\Http\Requests\CoursesRequest;
use Modules\Courses\src\Repositories\CoursesRepository;
use Modules\Categories\src\Repositories\CategoriesRepository;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Modules\Courses\src\Models\CourseCategory;
use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use Modules\Courses\src\Repositories\CoursesRepositoryInterface;
use Modules\Teacher\src\Repositories\TeacherRepositoryInterface;

class CoursesController extends Controller{
     protected $courseRepository;
     protected $categoryRepository;
     protected $teacherRepository;

    public function __construct(
        CoursesRepositoryInterface $courseRepository , 
        CategoriesRepository $categoryRepository,
        TeacherRepositoryInterface $teacherRepository) {
        $this->courseRepository = $courseRepository;
        $this->categoryRepository = $categoryRepository;
        $this->teacherRepository = $teacherRepository;
    }

    public function index(){
        $pageTitle = "Danh sách khóa học";
        return view('courses::lists',compact('pageTitle'));
    }

    public function data(){
        $courses = $this->courseRepository->getAllCourses();
        
        return DataTables::of($courses)
        ->addColumn('lesson', function($course) {
            return '<a href= "'.route('admin.lesson.index',$course).'" class = "btn btn-primary ">Lesson</a>';
        })
        ->addColumn('edit', function($course) {
            return '<a href= "'.route('admin.course.edit',$course).'" class = "btn btn-warning">Edit</a>';
        })
        ->addColumn('delete', function($course) {
            return '<a href= "'.route('admin.course.delete',$course).'" class = "btn btn-danger delete">Delete</a>';
        })
        ->editColumn('created_at', function($course) {
            return Carbon::parse($course->created_at)->format('d/m/Y H:i:s');
        })
        ->editColumn('status', function($course) {
            return $course->status == 1 ? '<span class="badge bg-success">Ra mắt</span>' : '<span class="badge bg-warning">Chưa ra mắt</span>';
        })
        ->editColumn('price', function($course) {
            if($course->sale_price != null){
                $price= number_format($course->sale_price);
            }else{
                $price= number_format($course->price);
            }
            return $price;
        })
        ->rawColumns(['edit','delete','status','lesson'])
        ->toJson();
   
    }

    public function create(){
        $pageTitle = "Thêm khóa học";
        $categories = $this->categoryRepository->getAll();
        $teacher = $this->teacherRepository->getAll();
        return view('courses::create',compact('pageTitle','categories','teacher'));
    }
    public function store(CoursesRequest $request){

        $course = $request->except('_token','categories');
        if (!$course['sale_price']) {
            $course['sale_price'] = 0;
        }

        if (!$course['price']) {
            $course['price'] = 0;
        }
        
        $course= $this->courseRepository->create($course);
        $course_id = $course->id; 
        $categories = $request->categories;
        
        foreach($categories as $category){
            CourseCategory::insert([
                'category_id' => $category,
                'course_id' => $course_id,
                'created_at' => Carbon::now(),

            ]);

        }

        toastr()->success(__('courses::message.success'));
        return redirect()->route('admin.course.index')->with('msg','Thêm thành công');
    }

    
    public function edit($id){
        $course = $this->courseRepository->find($id);
        $categories = $this->categoryRepository->getAll();
        $teachers = $this->teacherRepository->getAll();

        if(!$course){
            abort(404);
        }
        $pageTitle = 'Chỉnh sửa thông tin';

        return view('courses::edit',compact('course','pageTitle','categories','teachers'));
        }
    
    public function update(CoursesRequest $request,$id){

        $data = $request->except('_token','categories');
        
        if (!$data['sale_price']) {
            $data['sale_price'] = 0;
        }

        if (!$data['price']) {
            $data['price'] = 0;
        }
        $status = $this->courseRepository->update($id,$data);
        if($status){
            toastr()->success(__('courses::message.update.success'));
        }
        CourseCategory::where('course_id',$id)->delete();
        foreach ($request->categories as $category_id) {
            CourseCategory::insert([
                'category_id' => $category_id,
                'course_id' => $id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        return redirect()->route('admin.course.index');

        }

    public function delete($id){
        $image = $this->courseRepository->find($id)->pluck('image')->first();

           CourseCategory::where('course_id',$id)->delete();
           $status = $this->courseRepository->delete($id);
            
            if($status){
            deleteFileStorage($image);
        }
        toastr()->success(__('courses::message.delete.success'));
        return redirect()->route('admin.course.index');
        }
  

  
}