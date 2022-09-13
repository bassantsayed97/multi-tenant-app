<?php
namespace App\Repositories;

use App\Interfaces\TenantInterface;
use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantRepository extends BaseRepository implements TenantInterface
{
    protected $model;
    public function __construct(Tenant $model)
    {
        $this->model =$model;
    }
}
