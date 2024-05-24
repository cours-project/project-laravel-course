<?php
namespace Modules\Categories\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Modules\Categories\src\Http\Requests\CategoryRequest;
use Modules\Categories\src\Models\Category;
use Modules\Categories\src\Repositories\CategoriesRepository;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use voku\helper\ASCII;

class CategoriesController extends Controller{
    protected $categoriesRepository;
    public function __construct(CategoriesRepository $categoriesRepository) {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function index(){
        $pageTitle = "Danh sách danh mục";
        return view('categories::lists',compact('pageTitle'));
    }

    public function data(){
        $categories = $this->categoriesRepository->getCategories();
       
     
        return DataTables::of($categories)
        ->addColumn('edit', function($category) {
            return '<a href= "'.route('admin.category.edit',$category).'" class = "btn btn-warning">Edit</a>';
        })
        ->addColumn('delete', function($category) {
            return '<a href= "'.route('admin.category.delete',$category).'" class = "btn btn-danger delete">Delete</a>';
        })
        ->addColumn('link', function($category) {
            return '<a href= "'.route('admin.category.delete',$category).'">Xem ngay</a>';
        })
        ->editColumn('created_at', function($category) {
            return Carbon::parse($category->created_at)->format('d/m/Y H:i:s');
        })
        ->rawColumns(['edit','delete','link'])
        ->toJson();
    }

    public function create(){
        $pageTitle = "Thêm danh mục";
        $categories = $this->categoriesRepository->getAll();
        dd($categories);
        return view('categories::create',compact('pageTitle'));
    }


    public function store(CategoryRequest $request){
        $string = ASCII::to_ascii($request->name);
        $slug= Str::slug($string);
        $store = $this->categoriesRepository->create([
            'name' => $request->name,
            'slug' => $slug,
            'parent_id' => $request->parent_id,
        ]);
        toastr()->success(__('categories::message.success'));
        return redirect()->route('admin.category.index');
    }


    public function edit($id){
        $categories = $this->categoriesRepository->find($id);
        if(!$categories){
            abort(404);
        }
        $pageTitle = 'Chỉnh sửa danh mục';

        return view('categories::edit',compact('categories','pageTitle'));
    }

    public function update(CategoryRequest $request,$id){
        $data = $request->except('_token');
        
        $status = $this->categoriesRepository->update($id,$data);
        if($status){
            toastr()->success(__('categories::message.update.success'));
        }

    return redirect()->route('admin.category.index');
    }

    public function delete($id){
        $status = $this->categoriesRepository->delete($id);
        if($status){
            toastr()->success(__('categories::message.delete.success'));
        }
     return redirect()->route('admin.category.index');
        
    }
}
  
