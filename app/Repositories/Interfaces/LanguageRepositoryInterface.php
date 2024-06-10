<?php

namespace App\Repositories\Interfaces;

/**
 * Interface LanguageRepositoryInterface
 * @package App\Reponsitories\Interfaces
 */
interface LanguageRepositoryInterface
{
    public function pagination(array $column = ['*'], array $condition = [], array $join = [], array $extend = [], int $perPage = 10);
    public function create(array $payload = []);
    public function delete(int $id = 0);
    public function forceDelete(int $id = 0);
    public function findById(int $modelId, array $column = ['*'], array $relation = []);
    public function update(array $payload = [], int $id = 0);
    public function updateByWhereIn(string $whereInField, array $whereIn = [], array $payload);
}
