<?php

namespace Modules\Auth\src\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Modules\auth\src\Http\Requests\LoginRequest;
use Modules\Students\src\Models\Student;

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
    protected $redirectTo = 'login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:students');
        $this->middleware('auth:students')->only('logout');
    }



    public function showLoginForm()
    {
        $pageTitle = "Đăng nhập";
        return view('auth::client.login', compact('pageTitle'));
    }

    public function login(LoginRequest $request)
    {
        $dataLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];


        $status = Auth::guard('students')->attempt($dataLogin, $request->remember == 1 ? true : false);

        if ($status) {
            toastr()->success(__('auth::message.login.success'));

            return redirect()->route('index');
        } else {
            toastr()->error(__('auth::message.login.failure'));
            return  redirect()->back();
        }
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [__('auth::messages.login.failure')],
        ]);
    }

    public function showForgotForm()
    {
        $pageTitle = "Lấy lại mật khẩu";
        return view('auth::client.forgotPass', compact('pageTitle'));
    }

    public function handleForgotPass(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::broker('students')->sendResetLink(
            $request->only('email')
        );

        if($status === Password::RESET_LINK_SENT){
            toastr()->success(__('auth::message.password.sent.success'));
            return  back();

        }else{
            toastr()->error(__('auth::message.password.sent.failure'));
            return  back();
        }
        
    }

    public function resetPassword($token) {
        $pageTitle = 'Lấy lại mật khẩu';
        $_token = $token;
        return view('auth::client.resetPass', compact('_token','pageTitle'));
    }

    public function updatePassword(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|',
            'confirm_password' => 'required|same:password'
        ]);
     
        $status = Password::broker('students')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (Student $student, string $password) {
                $student->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $student->save();
               
                event(new PasswordReset($student));
            }
        );
        // dd($status);
     
        if($status === Password::PASSWORD_RESET){
            toastr()->success(__('auth::message.passwords.reset.success'));
            return redirect()->route('clients.login');
        }else{
            toastr()->error(__('auth::message.'.$status));
            return back();
        }
    }

    protected function loggedOut(Request $request)
    {
        return redirect()->route('login');
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('/');
    }
}
