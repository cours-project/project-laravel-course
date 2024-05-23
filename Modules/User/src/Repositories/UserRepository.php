<?php
namespace Modules\User\src\Repositories;
use Modules\User\src\Repositories\UserRepositoryInterface;
use App\Repositories\BaseRepository;
use Modules\User\src\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface{
    public function getModel(){
        return User::class;
    }
    public function getUsers($limit){
        return $this->model->paginate($limit);
    }
    public function getAllUsers()
    {
        return $this->model->select(['id', 'name', 'email', 'group_id', 'created_at'])->latest();
    }
}