<?php

namespace Modules\Auth\src\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlockController extends Controller
{
public function index(){
    $pageTitle = 'Block';
    $user= Auth::user();
    if ($user->status == 1) {
        return redirect()->route('index');
    }
    return view('auth::client.block',compact('pageTitle'));
}


}
