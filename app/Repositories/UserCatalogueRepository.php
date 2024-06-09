<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserCatalogueRepositoryInterface;
use App\Models\UserCatalogue;

class UserCatalogueRepository extends BaseRepository implements UserCatalogueRepositoryInterface
{
    protected $model;

    public function __construct(UserCatalogue $model)
    {
        $this->model = $model;
    }



    // Triển khai các phương thức được khai báo trong UserCatalogueRepositoryInterface
}
