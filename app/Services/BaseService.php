<?php

namespace App\Services;

use App\Services\Interfaces\BaseServiceInterface;

/**
 * Class BaseService
 * @package App\Services
 */
class BaseService implements BaseServiceInterface
{
    public function currentLanguage()
    {
        return 11;
    }
}
