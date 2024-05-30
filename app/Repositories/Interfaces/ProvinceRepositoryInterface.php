<?php

namespace App\Repositories\Interfaces;

/**
 * Interface UserServiceInterface
 * @package App\Reponsitories\Interfaces
 */
interface ProvinceRepositoryInterface
{
    public function all();
    public function findById(int $modelId, array $column = ['*'], array $relation = []);
}
