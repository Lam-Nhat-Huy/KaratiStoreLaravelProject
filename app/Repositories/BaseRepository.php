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

    public function pagination(array $column = ['*'], array $condition = [], array $join = [], array $extend = [], int $perPage = 10)
    {
        $query = $this->model->select($column)->where(function ($query) use ($condition) {
            if (isset($condition['keyword']) && !empty($condition['keyword'])) {
                $query->where('name', 'LIKE', '%' . $condition['keyword'] . '%');
            }

            if (isset($condition['publish']) && $condition['publish'] != -1) {
                $query->where('publish', '=', $condition['publish']);
            }

            return $query;
        });

        if (!empty($join)) {
            $query->join(...$join);
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
}
