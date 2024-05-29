<?php

namespace Modules\Auth\src\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function showLoginForm(){
        $titlePage = "Đăng nhập hệ thống";
        return view('auth::admin.login',compact('titlePage'));
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [__('auth::message.login.failure')],
        ]);
    }
    protected function loggedOut(Request $request)
    {
        return redirect()->route('admin.login');
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('admin.dashboard.index');

    }
}
