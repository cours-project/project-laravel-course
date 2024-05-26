<?php
namespace Modules\Courses\src\Http\Controllers;
use Modules\Courses\src\Http\Requests\CoursesRequest;
use Modules\Courses\src\Repositories\CoursesRepository;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

use App\Http\Controllers\Controller;

class CoursesController extends Controller{
     protected $courseRepository;
    public function __construct(CoursesRepository $courseRepository) {
        $this->courseRepository = $courseRepository;
    }

    public function index(){
        $pageTitle = "Danh sách khóa học";
        return view('courses::lists',compact('pageTitle'));
    }

    public function data(){
        $courses = $this->courseRepository->getAll();
        
        return DataTables::of($courses)
        ->addColumn('edit', function($course) {
            return '<a href= "'.route('admin.course.edit',$course).'" class = "btn btn-warning">Edit</a>';
        })
        ->addColumn('delete', function($course) {
            return '<a href= "'.route('admin.course.delete',$course).'" class = "btn btn-danger delete">Delete</a>';
        })
        ->editColumn('created_at', function($course) {
            return Carbon::parse($course->created_at)->format('d/m/Y H:i:s');
        })
        ->rawColumns(['edit','delete'])
        ->toJson();
   
    }

    public function create(){
        $pageTitle = "Thêm khóa học";
        return view('courses::create',compact('pageTitle'));
    }
    public function store(CoursesRequest $request){
       
        $store = $this->courseRepository->create([
            'name' => $request->name,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'password' => Hash::make($request->password),
        ]);
        toastr()->success(__('courses::message.success'));
        return redirect()->route('admin.courses.index')->with('msg','Thêm thành công');
    }

    
    public function edit($id){
        $course = $this->courseRepository->find($id);
        if(!$course){
            abort(404);
        }
        $pageTitle = 'Chỉnh sửa thông tin';

        return view('courses::edit',compact('course','pageTitle'));
        }
    
        public function update(CoursesRequest $request,$id){
            
            $data = $request->except('_token','password');
            if($request->password){
                $data['password'] = Hash::make($request->password);
            }
            
            $status = $this->courseRepository->update($id,$data);
            if($status){
                toastr()->success(__('courses::message.update.success'));
            }

        return redirect()->route('admin.courses.index');

        }

        public function delete($id){
           $status = $this->courseRepository->delete($id);
            if($status){
                toastr()->success(__('courses::message.delete.success'));
            }
        return redirect()->route('admin.courses.index');
        }
  

  
}