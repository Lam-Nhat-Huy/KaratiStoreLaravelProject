<?php

namespace App\Repositories;

use App\Models\Ward;
use App\Repositories\Interfaces\WardRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class WardService
 * @package App\Services
 */
class WardRepository extends BaseRepository implements WardRepositoryInterface
{
    protected $model;

    public function __construct(Ward $model)
    {
        $this->model = $model;
    }

    public function findWardByDistrictId()
    {
    }
}
