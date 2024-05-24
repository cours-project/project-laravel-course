<?php
namespace Modules\User\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\User\src\Http\Requests\UserRequest;
use Modules\User\src\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller{

    protected $userRepository;
    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function index(){
        $pageTitle = "Danh sách người dùng";
        $users = $this->userRepository->checkPassword('111',1);
        return view('user::lists',compact('pageTitle'));
    }

    public function data(){
        $users = $this->userRepository->getAllUsers();
       
     
        return DataTables::of($users)
        ->addColumn('edit', function() {
            return '<a class = "btn btn-warning">Edit</a>';
        })
        ->addColumn('delete', function() {
            return '<a class = "btn btn-danger">Delete</a>';
        })
        ->editColumn('created_at', function($user) {
            return Carbon::parse($user->created_at)->format('d/m/Y H:i:s');
        })
        ->rawColumns(['edit','delete'])
        ->toJson();
   
    }

    public function create(){
        $pageTitle = "Thêm người dùng";
        return view('user::create',compact('pageTitle'));
    }
    public function store(UserRequest $request){
       
        $store = $this->userRepository->create([
            'name' => $request->name,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'password' => Hash::make($request->password),
        ]);
        toastr()->success(__('user::message.success'));
        return redirect()->route('admin.user.index')->with('msg','Thêm thành công');
    }
}