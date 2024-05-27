<?php
namespace Modules\Teacher\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Teacher\src\Http\Requests\TeacherRequest;
use Modules\Teacher\src\Repositories\TeacherRepository;
use Carbon\Carbon as CarbonCarbon;
use Yajra\DataTables\Facades\DataTables;

class TeacherController extends Controller{
     protected $teacherRepository;
    public function __construct(TeacherRepository $teacherRepository) {
        $this->teacherRepository = $teacherRepository;
    }

    public function index(){
        $pageTitle = "Danh sách giảng viên";
        return view('teacher::lists',compact('pageTitle'));
    }

    public function data(){
        $teachers = $this->teacherRepository->getAllTeacher();
     
        return DataTables::of($teachers)
        ->addColumn('edit', function($teacher) {
            return '<a href= "'.route('admin.teacher.edit',$teacher).'" class = "btn btn-warning">Edit</a>';
        })
        ->addColumn('delete', function($teacher) {
            return '<a href= "'.route('admin.teacher.delete',$teacher).'" class = "btn btn-danger delete">Delete</a>';
        })
        ->editColumn('created_at', function($teacher) {
            return CarbonCarbon::parse($teacher->created_at)->format('d/m/Y H:i:s');
        })
        ->editColumn('image', function($teacher) {
            return '<img src="'.$teacher->image.'" class="img-fluid" style="text-algin:center;width:80px;height:65px">';
        })
        ->rawColumns(['edit','delete','image'])
        ->toJson();
   
    }

    public function create(){
        $pageTitle = "Thêm giảng viên";
        return view('teacher::create',compact('pageTitle'));
    }
    public function store(TeacherRequest $request){
       
        $teacher = $request->except(['_token']);
        $store = $this->teacherRepository->create($teacher);
        toastr()->success(__('teacher::message.success'));
        return redirect()->route('admin.teacher.index')->with('msg','Thêm thành công');
    }

    
    public function edit($id){
        $teacher = $this->teacherRepository->find($id);
        if(!$teacher){
            abort(404);
        }
        $pageTitle = 'Chỉnh sửa thông tin';

        return view('teacher::edit',compact('teacher','pageTitle'));
        }
    
        public function update(TeacherRequest $request,$id){
            
            $data = $request->except('_token','password');
            if($request->password){
                $data['password'] = Hash::make($request->password);
            }
            
            $status = $this->teacherRepository->update($id,$data);
            if($status){
                toastr()->success(__('teacher::message.update.success'));
            }

        return redirect()->route('admin.teacher.index');

        }

        public function delete($id){
            $image = $this->teacherRepository->find($id)->pluck('image')->first();
           
           $status = $this->teacherRepository->delete($id);
            if($status){
                deleteFileStorage($image);
            }
        toastr()->success(__('teacher::message.delete.success'));
        return redirect()->route('admin.teacher.index');
        
        }
  

  
}