<?php
namespace Modules\User\src\Repositories;
use Modules\User\src\Repositories\UserRepositoryInterface;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Modules\User\src\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface{
    public function getModel(){
        return User::class;
    }
    public function getUser($limit){
        return $this->model->paginate($limit);
    }
    public function getAllUsers(){
        return $this->model->select(['name','email','group_id','created_at','id']);
        
    }
    public function setPassword($password,$id){
        return $this->update($id,['password' => Hash::make($password)]);
    }
    public function checkPassword($password,$id){
        $hashPassword = $this->find($id)->pluck('password')->first();
        if($hashPassword){
            return Hash::check($password,$hashPassword);
        }
    }


}

?>