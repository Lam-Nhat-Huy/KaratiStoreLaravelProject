<?php

namespace App\Repositories;

use App\Models\Base;
use App\Models\User;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseService
 * @package App\Services
 */

/*Nơi làm chức năng thêm sửa xóa, có thể tái sử bằng cách exstend BaseRepository*/
class BaseRepository implements BaseRepositoryInterface
{

    /* Xài chung thì viết hàm bên đây rồi */
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function pagination(
        array $column = ['*'],
        array $condition = [],
        int $perPage = 10,
        array $orderBy = [],
        array $extend = [],
        array $join = [],
        array $relations = [],
        array $where = []
    ) {
        $query = $this->model->select($column)->where(function ($query) use ($condition) {
            if (isset($condition['keyword']) && !empty($condition['keyword'])) {
                $query->where('name', 'LIKE', '%' . $condition['keyword'] . '%');
            }

            if (isset($condition['publish']) && $condition['publish'] != 0) {
                $query->where('publish', '=', $condition['publish']);
            }

            return $query;
        });

        if (isset($join) && is_array($join) && count($join)) {
            foreach ($join as $key => $value) {
                $query->join($value[0], $value[1], $value[2], $value[3]);
            }
        }

        if (isset($orderBy) && !empty($orderBy)) {
            $query->orderBy($orderBy[0], $orderBy[1]);
        }

        if (isset($condition['where']) && count($condition['where'])) {
            foreach ($condition['where'] as $key => $value) {
                $query->where($value[0], $value[1], $value[2]);
            }
        }

        return $query->paginate($perPage)->withQueryString()->withPath(env('APP_URL') . $extend['path']);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function findById(int $modelId, array $column = ['*'], array $relation = [])
    {
        return $this->model->select($column)->with($relation)->findOrFail($modelId);
    }

    public function create(array $payload = [])
    {
        $model = $this->model->create($payload);
        return $model->fresh();
    }

    public function delete(int $id = 0)
    {
        return $this->findById($id)->delete();
    }

    public function forceDelete(int $id = 0)
    {
        return $this->findById($id)->forceDelete();
    }

    public function update(array $payload = [], int $id = 0)
    {
        $model = $this->findById($id);
        return $model->update($payload);
    }

    public function updateByWhereIn(string $whereInField, array $whereIn = [], array $payload)
    {
        return $this->model->whereIn($whereInField, $whereIn)->update($payload);
    }

    public function createLanguagePivot($model, array $payload = [])
    {
        return $model->languages()->attach($model->id, $payload); // hàm language được trỏ từ model ra
    }
}
