<?php
namespace Modules\Videos\src\Repositories;
use App\Repositories\RepositoryInterface;


interface VideosRepositoryInterface extends RepositoryInterface{
    public function createVideo($data);
}