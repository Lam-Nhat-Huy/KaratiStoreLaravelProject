<?php

namespace App\Repositories\Interfaces;

/**
 * Interface UserServiceInterface
 * @package App\Reponsitories\Interfaces
 */
interface UserRepositoryInterface
{
    public function getAllPaginate();
    public function create(array $payload = []);
}
