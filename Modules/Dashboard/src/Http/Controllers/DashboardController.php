<?php
namespace Modules\Dashboard\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Dashboard\src\Repositories\DashboardRepositoryInterface;

class DashboardController extends Controller{
     protected $dashboardRepository;
    public function __construct(DashboardRepositoryInterface $dashboardRepository) {
        $this->dashboardRepository = $dashboardRepository;
    }

    public function index(){
        $pageTitle = "Tổng quan";
        return view('dashboard::index',compact('pageTitle'));
    }

    public function data(){

    }

    public function create(){
        
    }

    // public function store(DashboardRequest $request){

    // }


    public function edit($id){

    }

    // public function update(DashboardRequest $request,$id){

    // }

    public function delete($id){
        
    }
}
  