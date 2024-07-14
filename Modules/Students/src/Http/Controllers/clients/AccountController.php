<?php

namespace Modules\Students\src\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Students\src\Http\Requests\Clients\AccountRequest;
use Modules\Students\src\Http\Requests\Clients\PasswordRequest;
use Modules\Students\src\Repositories\StudentsRepositoryInterface;

class AccountController extends Controller
{
  protected $studentRepository;
  public function __construct(StudentsRepositoryInterface $studentRepository)
  {
    $this->studentRepository = $studentRepository;
  }

  public function index()
  {
    $pageTitle = 'Tài khoản';
    $content = 'dashboard';
    $user = Auth::user();
    return view('students::clients.account', compact('pageTitle', 'content', 'user'));
  }
  public function updateAccount(AccountRequest $request)
  {
    $id = Auth::guard('students')->user()->id;
    $status = $this->studentRepository->update($id, [
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
      'address' => $request->address,
    ]);
    return ['success' => $status];
  }
  public function myCourses(Request $request)
  {
    $pageTitle = 'Khóa học của tôi';
    $content = 'myCourse';
    $studentId = Auth::guard('students')->user()->id;
    $filters = [];
    if ($request->teacher_id) {
      $filters['teacher_id'] = $request->teacher_id;
  }

  if ($request->keyword) {
      $filters['keyword'] = $request->keyword;
  }
    $courses = $this->studentRepository->getCourses($studentId,$filters,config('paginate.account_paginate'));
    $teachers = collect();

    foreach ($courses as $course) {
        $teachers->put(
          $course->teacher->id , $course->teacher->name
        );
    }

    $uniqueTeachers = $teachers->unique();
    return view('students::clients.account', compact('pageTitle', 'content','courses','uniqueTeachers'));
  }
  public function myOrders()
  {
    $pageTitle = 'Đơn hàng của tôi';
    $content = 'myOrder';
    return view('students::clients.account', compact('pageTitle', 'content'));
  }
  public function changeMyPass()
  {
    $pageTitle = 'Thay đổi mật khẩu';
    $content = 'changePass';
    return view('students::clients.account', compact('pageTitle', 'content'));
  }
  public function updatePass(PasswordRequest $request)
  {
    $id = Auth::guard('students')->user()->id;
    $status = $this->studentRepository->update(
      $id,
      [
        'password' => Hash::make($request->password)
      ]
    );

    toastr()->success(__('students::message.update.success'));
    return back();
  }
}
