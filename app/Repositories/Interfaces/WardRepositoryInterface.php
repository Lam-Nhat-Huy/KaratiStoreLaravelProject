<?php

namespace App\Repositories\Interfaces;

/**
 * Interface WardServiceInterface
 * @package App\Reponsitories\Interfaces
 */
interface WardRepositoryInterface
{
    public function all();
    public function findWardByDistrictId();
}
