<?php

namespace App\Traits;


trait QueryScopes
{
    public function scopeKeyword($query, $keyword = [])
    {
        if (!empty($keyword)) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
        }
        return $query;
    }

    public function scopePublish($query, $publish)
    {
        if (!empty($publish)) {
            $query->where('publish', '=', $publish);
        }
    }

    public function scopeRelationCount($query, $relation)
    {
        if (!empty($relation)) {
            foreach ($relation as $item) {
                $query->withCount($item);
            }
        }
        return $query;
    }

    public function scopeRelation($query, $relation)
    {
        if (!empty($relation)) {
            foreach ($relation as $relation) {
                $query->with($relation);
            }
        }
        return $query;
    }

    public function scopeCustomJoin($query, $join)
    {
        if (!empty($join)) {
            foreach ($join as $key => $value) {
                $query->join($value[0], $value[1], $value[2], $value[3]);
            }
        }
        return $query;
    }

    public function scopeCustomOrderBy($query, $orderBy)
    {
        if (isset($orderBy) && !empty($orderBy)) {
            $query->orderBy($orderBy[0], $orderBy[1]);
        }
        return $query;
    }

    public function scopeCustomWhere($query, $where = [])
    {
        if (count($where)) {
            foreach ($where as $key => $value) {
                $query->where($value[0], $value[1], $value[2]);
            }
        }
    }
}
