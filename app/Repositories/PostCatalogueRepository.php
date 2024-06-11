<?php

namespace App\Repositories;

use App\Repositories\Interfaces\PostCatalogueRepositoryInterface;
use App\Models\PostCatalogue;

class PostCatalogueRepository extends BaseRepository implements PostCatalogueRepositoryInterface
{
    protected $model;

    public function __construct(PostCatalogue $model)
    {
        $this->model = $model;
    }



    // Triển khai các phương thức được khai báo trong PostCatalogueRepositoryInterface
}
