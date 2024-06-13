<?php

namespace App\Repositories\Interfaces;

/**
 * Interface BaseServiceInterface
 * @package App\Reponsitories\Interfaces
 */
interface BaseRepositoryInterface
{
    public function all();
    public function create(array $payload = []);
    public function pagination(array $column = ['*'], array $condition = [], array $join = [], array $extend = [], int $perPage = 10, array $relations = [], array $orderBy = [], array $where = []);
    public function delete(int $id = 0);
    public function forceDelete(int $id = 0);
    public function findById(int $modelId, array $column = ['*'], array $relation = []);
    public function update(array $payload = [], int $id = 0);
    public function updateByWhereIn(string $whereInField, array $whereIn = [], array $payload);
    public function createLanguagePivot($model, array $payload = []);
}
