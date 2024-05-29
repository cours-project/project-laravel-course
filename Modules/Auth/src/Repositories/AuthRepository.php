<?php
namespace Modules\Auth\src\Repositories;
use Modules\Auth\src\Repositories\AuthRepositoryInterface;
use App\Repositories\BaseRepository;
use Modules\Auth\src\Models\Auth;

class AuthRepository extends BaseRepository implements AuthRepositoryInterface{
    public function getModel(){
        return Auth::class;
    }

}

?>