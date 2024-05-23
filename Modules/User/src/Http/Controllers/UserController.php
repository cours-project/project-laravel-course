<?php
namespace Modules\User\src\Http\Controllers;
use Modules\User\src\Models\User;
use App\Http\Controllers\Controller;
use Modules\User\src\Repositories\UserRepository;

class UserController extends Controller{

    protected $userRepo;
    public function __construct(UserRepository $userRepo) {
        $this->userRepo = $userRepo;
    }
    public function index(){
        $user = $this->userRepo->getUsers(3);
        dd($user);
    }
    public function detail(){
        return view('user::test');
    }
    public function create(){
        $user = new User();
        $user->name = "Van Hung";
        $user->address = " Quan 12";
        $user->save();
    }
}