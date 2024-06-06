<?php
namespace Modules\User\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\User\src\Http\Requests\UserRequest;
use Modules\User\src\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Modules\User\src\Repositories\UserRepositoryInterface;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller{

    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository) {
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
        ->addColumn('edit', function($user) {
            return '<a href= "'.route('admin.user.edit',$user).'" class = "btn btn-warning">Edit</a>';
        })
        ->addColumn('delete', function($user) {
            return '<a href= "'.route('admin.user.delete',$user).'" class = "btn btn-danger delete">Delete</a>';
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
        return redirect()->route('admin.user.index');
    }

    
    public function edit($id){
        $user = $this->userRepository->find($id);
        if(!$user){
            abort(404);
        }
        $pageTitle = 'Chỉnh sửa thông tin';

        return view('user::edit',compact('user','pageTitle'));
        }
    
        public function update(UserRequest $request,$id){
            
            $data = $request->except('_token','password');
            if($request->password){
                $data['password'] = Hash::make($request->password);
            }
            
            $status = $this->userRepository->update($id,$data);
            if($status){
                toastr()->success(__('user::message.update.success'));
            }

        return redirect()->route('admin.user.index');

        }

        public function delete($id){
           $status = $this->userRepository->delete($id);
            if($status){
                toastr()->success(__('user::message.delete.success'));
            }
        return redirect()->route('admin.user.index');
        }
}