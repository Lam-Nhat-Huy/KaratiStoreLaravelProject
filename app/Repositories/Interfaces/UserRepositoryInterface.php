<?php

namespace App\Repositories\Interfaces;

/**
 * Interface UserServiceInterface
 * @package App\Reponsitories\Interfaces
 */
interface UserRepositoryInterface
{
    public function pagnition(array $column = ['*'], array $condition = [], array $join = [], int $perpage = 10);
    public function create(array $payload = []);
    public function update(array $payload = [], int $id = 0);
    public function delete(int $id = 0);
    public function forceDelete(int $id = 0);
    public function findById(int $modelId, array $column = ['*'], array $relation = []);
}
