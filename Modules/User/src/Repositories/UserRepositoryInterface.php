<?php
namespace Modules\User\src\Repositories;
use App\Repositories\RepositoryInterface;
use Dotenv\Repository\RepositoryInterface as RepositoryRepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface{

    public function getUsers($limit);
}