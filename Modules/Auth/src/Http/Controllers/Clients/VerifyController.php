<?php

namespace Modules\Auth\src\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyController extends Controller
{
public function index(){
    $pageTitle = 'Verify';
    return view('auth::client.verify',compact('pageTitle'));
}

public function resend(Request $request) {
    $request->user()->sendEmailVerificationNotification();
    toastr()->info('Gửi mail thành công');
    return back();
}
}
