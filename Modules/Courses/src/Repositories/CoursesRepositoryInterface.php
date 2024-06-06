<?php
namespace Modules\Courses\src\Repositories;
use App\Repositories\RepositoryInterface;


interface CoursesRepositoryInterface extends RepositoryInterface{
    public function getModel();
    public function getAllCourses();
    public function getCourses($limit);
    public function courseDetail($slug);
}