<?php
namespace Modules\Categories\src\Http\Controllers;

use App\Http\Controllers\Controller;

class CategoriesController extends Controller{
    protected $userRepository;
    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function index(){
      
    }

    public function data(){

    }

    public function create(){
        
    }

    // public function store(UserRequest $request){

    // }


    public function edit($id){

    }

    // public function update(UserRequest $request,$id){

    // }

    public function delete($id){
        
    }
}
  
