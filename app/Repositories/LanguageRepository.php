<?php

namespace App\Repositories;

use App\Models\Language;
use App\Repositories\Interfaces\LanguageRepositoryInterface;

/**
 * Class LanguageRepository
 * @package App\Repositories
 */
class LanguageRepository extends BaseRepository implements LanguageRepositoryInterface
{
    protected $model;

    public function __construct(Language $model)
    {
        $this->model = $model;
    }

    public function findCurrentLanguage($id)
    {
        return $this->model->select('canonical')->where('current', '=', 1)->first();
    }
}
