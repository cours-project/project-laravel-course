<?php
namespace Modules\Categories\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Modules\Categories\src\Http\Requests\CategoryRequest;
use Modules\Categories\src\Models\Category;
use Modules\Categories\src\Repositories\CategoriesRepository;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Modules\Categories\src\Repositories\CategoriesRepositoryInterface;
use voku\helper\ASCII;

class CategoriesController extends Controller{
    protected $categoriesRepository;
    public function __construct(CategoriesRepositoryInterface $categoriesRepository) {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function index(){
        $pageTitle = "Danh sách danh mục";
        
        return view('categories::lists',compact('pageTitle'));
    }

    // public function data(){
    //     $categories = $this->categoriesRepository->getCategories();
     
    //     return DataTables::of($categories)
    //     ->addColumn('edit', function($category) {
    //         return '<a href= "'.route('admin.category.edit',$category).'" class = "btn btn-warning">Edit</a>';
    //     })
    //     ->addColumn('delete', function($category) {
    //         return '<a href= "'.route('admin.category.delete',$category).'" class = "btn btn-danger delete">Delete</a>';
    //     })
    //     ->addColumn('link', function($category) {
    //         return '<a href= "'.route('admin.category.delete',$category).'">Xem ngay</a>';
    //     })
    //     ->editColumn('created_at', function($category) {
    //         return Carbon::parse($category->created_at)->format('d/m/Y H:i:s');
    //     })
    //     ->rawColumns(['edit','delete','link'])
    //     ->toJson();
    // }

    public function data()
    {
        $categories = $this->categoriesRepository->getCategories();
        $categories = DataTables::of($categories)
            ->toArray();

        $categories['data'] = $this->getCategoriesTable($categories['data']);

        return $categories;
    }

    public function getCategoriesTable($categories, $char = '', &$result = [])
    {
        if (!empty($categories)) {
            foreach ($categories as $key => $category) {
                $row = $category;
                $row['name'] = $char . $row['name'];
                $row['edit'] = '<a href="' . route('admin.category.edit', $category['id']) . '" class="btn btn-warning">Sửa</a>';
                $row['delete'] = '<a href="' . route('admin.category.delete', $category['id']) . '" class="btn btn-danger delete-action">Xóa</a>';
                $row['link'] = '<a target="_blank" href="/danh-muc/' . $category['slug'] . '" class="btn btn-primary">Xem</a>';
                $row['created_at'] = Carbon::parse($category['created_at'])->format('d/m/Y H:i:s');
                unset($row['sub_categories']);
                unset($row['updated_at']);
                $result[] = $row;
                if (!empty($category['sub_categories'])) {
                    $this->getCategoriesTable($category['sub_categories'], $char . '|--', $result);
                }
            }
        }

        return $result;
    }

    public function create(){
        $pageTitle = "Thêm danh mục";
        $categories = $this->categoriesRepository->getAll();
        return view('categories::create',compact('pageTitle','categories'));
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
        $getCataId = $this->categoriesRepository->find($id);
        $allCata = $this->categoriesRepository->getAll();
        if(!$getCataId){
            abort(404);
        }
        $pageTitle = 'Chỉnh sửa danh mục';

        return view('categories::edit',compact('getCataId','pageTitle','allCata'));
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
  
