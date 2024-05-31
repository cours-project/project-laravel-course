<?php
namespace Modules\Lessons\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Modules\Courses\src\Repositories\CoursesRepositoryInterface;
use Modules\Documents\src\Repositories\DocumentsRepositoryInterface;
use Modules\Lessons\src\Http\Requests\LessonRequest;
use Modules\Lessons\src\Repositories\LessonsRepositoryInterface;
use Modules\Videos\src\Repositories\VideosRepositoryInterface;
use Yajra\DataTables\Facades\DataTables;

class LessonsController extends Controller{
    
    protected $courseRepository;
    protected $lessonRepository;
    protected $videoRepository;
    protected $documentRepository;



    public function __construct(
      CoursesRepositoryInterface $courseRepository  ,
      VideosRepositoryInterface $videoRepository , 
      LessonsRepositoryInterface $lessonRepository,
      DocumentsRepositoryInterface $documentRepository
  ){
        $this->courseRepository = $courseRepository;
        $this->lessonRepository = $lessonRepository;
        $this->videoRepository = $videoRepository;
        $this->documentRepository = $documentRepository;

    }

    public function index($id){
      $course = $this->courseRepository->find($id)->pluck('name')->first();
      $pageTitle = "Danh sách bài giảng : $course";
      return view('lessons::lists', compact('pageTitle','id'));
  }
    
    public function data($id){
      $lessons = $this->lessonRepository->getLessons($id)->orderBy('position','asc');

      $lessons = DataTables::of($lessons)->toArray();
      $lessons['data'] = $this->getLessionsTable($lessons['data']);

      return $lessons;
      
    }

    public function getLessionsTable($lessons, $char = '', &$result = [])
    {
      if (!empty($lessons)) {
      foreach ($lessons as $key => $lesson) {
      $row = $lesson;
      $row['name'] = $char . $row['name'];
      if ($row['parent_id'] == null) {
          $row['is_trial'] = '';
          $row['view'] = '';
          $row['durations'] = '';
          $row['add'] = '<a href="' . route('admin.lesson.create', $row['course_id']) . '?module=' . $row['id'] . '" class="btn btn-primary btn-sm">Thêm bài</a>';
          $row['edit'] = '<a href="' . route('admin.lesson.edit', $row['id']) . '" class="btn btn-warning btn-sm">Sửa</a>';
          $row['delete'] = '<a href="' . route('admin.lesson.delete', $row['id']) . '" class="btn btn-danger btn-sm delete-action">Xóa</a>';
      } else {
          $row['is_trial'] = ($row['is_trial'] == 1 ? 'Có' : 'Không');
          $row['view'] = $row['view'];
          $row['durations'] = getTime($row['durations'])." giây" ;
          $row['add'] = '';
          $row['edit'] = '<a href="' . route('admin.lesson.edit', $row['id']) . '" class="btn btn-warning btn-sm">Sửa</a>';
          $row['delete'] = '<a href="' . route('admin.lesson.delete', $row['id']) . '" class="btn btn-danger btn-sm delete-action">Xóa</a>';

      }

      unset($row['sub_lessons']);
      unset($row['course_id']);

      $result[] = $row;
      if (!empty($lesson['sub_lessons'])) {
          $this->getLessionsTable($lesson['sub_lessons'], $char . '|--', $result);
      }
      }
      }

     return $result;
    }

    public function create($id){
        $pageTitle = "Thêm mới bài giảng";
        $position = $this->lessonRepository->getPosition($id);
        $lessons = $this->lessonRepository->getAll();
        return view('lessons::create',compact('pageTitle','id','position','lessons'));
    }

    public function store(LessonRequest $request, $id){

      $video_id = null ;
      $document_id = null ;
      $parentId = $request->parent_id == 0 ? null : $request->parent_id;

      if($request->video){
      $video = $request->video;
      $video_info = getInfoVideo($video);
      $resultVideo = $this->videoRepository->createVideo(
        ['url' => $video , 
        'name' => $video_info['filename'],
        'size'=> $video_info['playtime_seconds']]);
      $video_id = $resultVideo->id;
      }


      if($request->document){
        $resultDoc = getInfoDoc($request->document);
        $resultDocument = $this->documentRepository->createDocument(['url' => $request->document,'name'=>$resultDoc['nameDoc'], 'size'=> $resultDoc['sizeDoc'] ]);
        $document_id = $resultDocument->id;
      }


      $this->lessonRepository->create([
        'name' => $request->name,
            'slug' => $request->slug,
            'video_id' => $video_id,
            'course_id' => $id,
            'document_id' => $document_id,
            'parent_id' => $parentId,
            'is_trial' => $request->is_trial,
            'position' => $request->position,
            'durations' => $video_info['playtime_seconds'] ?? 0,
            'description' => $request->description,
            'status' => $request->status,
      ]);

      toastr()->success(__('lessons::messages.create.success'));
      return redirect()->route('admin.lesson.index',$id);

    }


    public function edit($id){
      $lesson = $this->lessonRepository->find($id);
      $lessons = $this->lessonRepository->getAll();
      $pageTitle = "Chỉnh sửa bài học : " .$lesson->name;
      $document_id = $this->documentRepository;

      return view('lessons::edit',compact('lesson','pageTitle','lessons','id'));

    }

    public function update(LessonRequest $request,$id){
      

      $video_id = null ;
      $document_id = null ;
      $parentId = $request->parent_id == 0 ? null : $request->parent_id;

    

      if($request->video){
      $video = $request->video;
      $video_info = getInfoVideo($video);
      $resultVideo = $this->videoRepository->createVideo(
        ['url' => $video , 
        'name' => $video_info['filename'],
        'size'=> $video_info['playtime_seconds']]);
      $video_id = $resultVideo ? $resultVideo->id : null ;
      }


      if($request->document){
        $resultDoc = getInfoDoc($request->document);
        $resultDocument = $this->documentRepository->createDocument(['url' => $request->document,'name'=>$resultDoc['nameDoc'], 'size'=> $resultDoc['sizeDoc'] ]);
        $document_id = $resultDocument ? $resultDocument->id : null ;
      }
      $this->lessonRepository->update($id ,[
        'name' => $request->name,
            'slug' => $request->slug,
            'video_id' => $video_id,
            'course_id' => $request->course_id,
            'document_id' => $document_id,
            'parent_id' => $parentId,
            'is_trial' => $request->is_trial,
            'position' => $request->position,
            'durations' => $video_info['playtime_seconds'] ?? 0,
            'description' => $request->description,
            'status' => $request->status,
      ]);

      toastr()->success(__('lessons::messages.update.success'));
      return redirect()->route('admin.lesson.index',$request->course_id);

    }

    public function delete($id){
        $this->lessonRepository->delete($id);

        toastr()->success(__('lessons::messages.delete.success'));
        return redirect()->route('admin.lesson.index',7);
  
    }

    public function sort($id){
      $pageTitle = "Sắp xếp bài giảng";

      $modules = $this->lessonRepository->getLessons($id)->with('children')->orderBy('position','asc')->get();

      return view('lessons::sort',compact('pageTitle','modules','id'));
    }

    public function handleSort(Request $request ,$id){
      $lessons = $request->lesson;
      if ($lessons) {
          foreach ($lessons as $index => $lessionId) {
              $this->lessonRepository->update($lessionId, [
                  'position' => $index,
              ]);
          }

      toastr()->success(__('lessons::messages.update.success'));

      return redirect()->route('admin.lesson.index',$id);
    }
}
  
}
  