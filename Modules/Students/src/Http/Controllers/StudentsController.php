<?php
namespace Modules\Students\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Modules\Students\src\Http\Requests\StudentRequest;
use Modules\Students\src\Repositories\StudentsRepositoryInterface;
use Yajra\DataTables\Facades\DataTables;

class StudentsController extends Controller{
     protected $studentRepository;
    public function __construct(StudentsRepositoryInterface $studentRepository) {
        $this->studentRepository = $studentRepository;
    }

    public function index(){
        $pageTitle = 'Danh sách học viên';
      return view('students::lists',compact('pageTitle'));
    }

    public function data(){
        
            $students = $this->studentRepository->getAll();
           
         
            return DataTables::of($students)
            ->addColumn('edit', function($student) {
                return '<a href= "'.route('admin.student.edit',$student).'" class = "btn btn-warning">Edit</a>';
            })
            ->addColumn('delete', function($student) {
                return '<a href= "'.route('admin.student.delete',$student).'" class = "btn btn-danger delete">Delete</a>';
            })
            ->editColumn('status', function($student) {
                return $student->status == 1 ? '<span class="badge bg-success">Kích hoạt</span>': '<span class="badge bg-danger">Chưa kích hoạt</span>';
            })
            ->editColumn('created_at', function($student) {
                return Carbon::parse($student->created_at)->format('d/m/Y H:i:s');
            })
            ->rawColumns(['edit','delete','status'])
            ->toJson();
    }

    public function create(){
        $pageTitle = "Thêm mới học viên";
        return view('students::create',compact('pageTitle'));
    }

    public function store(StudentRequest $request){
        $store = $this->studentRepository->create([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phone' => $request->phone
        ]);
        toastr()->success(__('students::message.success'));
        return redirect()->route('admin.student.index');
    }


    public function edit($studentId){
        $pageTitle = 'Chỉnh sửa học viên';
        $student = $this->studentRepository->find($studentId);
        return view('students::edit',compact('pageTitle','student','studentId'));
    }

    public function update(StudentRequest $request,$id){

        $data = $request->except('_token', 'password');

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $this->studentRepository->update($id, $data);

        toastr()->success(__('students::message.update.success'));


        return back();
    }

    public function delete($id)
    {
        /*
        Dữ liệu liên quan: 
        - Liên kết giữa học viên và khóa học
        - Trung gian: Thống kê học viên, liên kết tài khoản mạng xã hội
        */
        $this->studentRepository->delete($id);

        return back()->with('msg', __('students::messages.delete.success'));
    }
}