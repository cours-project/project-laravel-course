<?php

namespace Modules\Students\src\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Orders\src\Repositories\OrdersRepositoryInterface;
use Modules\Orders\src\Repositories\OrdersStatusRepositoryInterface;
use Modules\Students\src\Http\Requests\Clients\AccountRequest;
use Modules\Students\src\Http\Requests\Clients\PasswordRequest;
use Modules\Students\src\Repositories\StudentsRepositoryInterface;

use Carbon\Carbon ;

class AccountController extends Controller
{
  protected $studentRepository;
  protected $orderRepository;
  protected $orderStatusRepository;

  public function __construct(StudentsRepositoryInterface $studentRepository, OrdersRepositoryInterface $orderRepository, OrdersStatusRepositoryInterface $orderStatusRepository)
  {
    $this->studentRepository = $studentRepository;
    $this->orderRepository = $orderRepository;
    $this->orderStatusRepository = $orderStatusRepository;
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
    $courses = $this->studentRepository->getCourses($studentId, $filters, config('paginate.account_paginate'));
    $teachers = collect();

    foreach ($courses as $course) {
      $teachers->put(
        $course->teacher->id,
        $course->teacher->name
      );
    }

    $uniqueTeachers = $teachers->unique();
    return view('students::clients.account', compact('pageTitle', 'content', 'courses', 'uniqueTeachers'));
  }
  public function myOrders(Request $request)
  {
    $pageTitle = 'Đơn hàng của tôi';
    $content = 'myOrder';
    $studentId = Auth::guard('students')->user()->id;
    $orderStatus = $this->orderStatusRepository->getAllOrdersStatus();
    $filters = [];
    if ($request->status_id) {
      $filters['status_id'] = $request->status_id;
    }

    if ($request->start_date) {
      $filters['start_date'] = Carbon::parse($request->start_date)->format('Y-m-d');
    }
    if ($request->end_date) {
      $filters['end_date'] = Carbon::parse($request->end_date)->format('Y-m-d');
    }
  
    if ($request->total) {
      $filters['total'] = $request->total;
    }
    $orders = $this->orderRepository->getOrdersByStudents($studentId, $filters,config('paginate.account_paginate'));


    return view('students::clients.account', compact('pageTitle', 'content', 'orders', 'orderStatus'));
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
