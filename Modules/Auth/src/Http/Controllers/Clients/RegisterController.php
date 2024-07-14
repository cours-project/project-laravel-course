<?php

namespace Modules\Auth\src\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Modules\auth\src\Http\Requests\RegisterReqest;
use Modules\Students\src\Repositories\StudentsRepositoryInterface;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $studentRepository;
    public function __construct(StudentsRepositoryInterface $studentRepository)
    {
        $this->middleware('guest:students');
        $this->studentRepository = $studentRepository;
    }

    public function showRegistrationForm()
    {
        $pageTitle = "Đăng ký";
        return view('auth::client.register', compact('pageTitle'));
    }

    public function register(RegisterReqest $request)
    {
        $store = $this->studentRepository->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if($store == false){
            toastr()->success(__('students::message.register.failure'));
            return back();
        }
        event(new Registered($store));
        Auth::guard('students')->loginUsingId($store->id);
        return redirect()->route('verification.notice');
    }
}
