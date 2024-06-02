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
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function pagnition(array $column = ['*'], array $condition = [], array $join = [], int $perpage = 10)
    {
        $query = $this->model->select($column)->where($condition);
        if (!empty($join)) {
            $query->join(...$join);
        }

        return $query->paginate($perpage);
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
}