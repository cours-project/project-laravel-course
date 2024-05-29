<?php
namespace Modules\Dashboard\src\Repositories;
use Modules\Dashboard\src\Repositories\DashboardRepositoryInterface;
use App\Repositories\BaseRepository;
use Modules\Dashboard\src\Models\Dashboard;

class DashboardRepository extends BaseRepository implements DashboardRepositoryInterface{
    public function getModel(){
        return Dashboard::class;
    }

}

?>