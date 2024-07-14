<?php
namespace Modules\Students\src\Repositories;
use App\Repositories\RepositoryInterface;


interface StudentsRepositoryInterface extends RepositoryInterface{

    public function getCourses($studentId, $filter,$limit);
}