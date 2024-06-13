<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;
use App\Models\UserCatalogue;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /* Xài riêng thì viết hàm bên đây */

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function pagination(array $column = ['*'], array $condition = [], array $join = [], array $extend = [], int $perPage = 10, array $relations = [], array $orderBy = [])
    {
        $query = $this->model->select($column)->where(function ($query) use ($condition) {
            if (isset($condition['keyword']) && !empty($condition['keyword'])) {
                $query->where('name', 'LIKE', '%' . $condition['keyword'] . '%')
                    ->orWhere('email', 'LIKE', '%' . $condition['keyword'] . '%')
                    ->orWhere('phone', 'LIKE', '%' . $condition['keyword'] . '%');
            }

            if (isset($condition['publish']) && $condition['publish'] != 0) {
                $query->where('publish', '=', $condition['publish']);
            }
            return $query;
        })->with('user_catalogues');

        if (!empty($join)) {
            $query->join(...$join);
        }

        return $query->paginate($perPage)->withQueryString()->withPath(env('APP_URL') . $extend['path']);
    }

    public function getUserCatalogue()
    {
        $userCatalogue = UserCatalogue::all();
        return $userCatalogue;
    }
}
