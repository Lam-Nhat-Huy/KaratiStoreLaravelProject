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

    public function pagination(array $column = ['*'], array $condition = [], int $perPage = 10, array $orderBy = ['id' => 'DESC'], array $extend = [], array $join = [], array $relations = [], array $where = [])
    {
        $query = $this->model->select($column)
            ->keyword($condition['keyword'] ?? null)
            ->publish($condition['publish'] ?? null)
            ->relationCount($relations ?? null)
            ->customJoin($join ?? null)
            ->customOrderBy($orderBy ?? null)
            ->customWhere($condition['where'] ?? null)
            ->paginate($perPage)->withQueryString()->withPath(env('APP_URL') . $extend['path']);
        return $query;
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

    public function createPivot($model, array $payload = [], string $relation = '')
    {
        return $model->{$relation}()->attach($model->id, $payload);
    }
}
