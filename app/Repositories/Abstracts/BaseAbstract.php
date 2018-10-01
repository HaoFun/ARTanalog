<?php

namespace App\Repositories\Abstracts;

use Illuminate\Database\Eloquent\Model;

abstract class BaseAbstract
{
    protected $model;

    public function __construct()
    {
        $this->makeModel();
    }

    abstract function model();

    public function makeModel()
    {
        $model = app()->make($this->model());
        if (!$model instanceof Model) {
            abort(400, sprintf(trans('label.not_found'),
                'Model', $this->model()));
        }
        return $this->model = $model;
    }

    public function all($columns = ['*'])
    {
        return $this->model->get($columns);
    }

    public function paginate($columns = ['*'], $per_page = 20)
    {
        return $this->model->select($columns)->paginate($per_page);
    }

    public function insert(array $data)
    {
        return $this->model->insert($data);
    }

    public function find($id, $columns = ['*'])
    {
        return $this->model->find($id, $columns);
    }

    public function findBy($field, $value, $columns = ['*'])
    {
        return $this->model->where($field, $value)->first($columns);
    }

    public function findWhereInBy($field, $value, $columns = ['*'])
    {
        return $this->model->whereIn($field, $value)->get($columns);
    }

    public function findWith($with, $id, $columns)
    {
        return $this->model->with($with)->find($id, $columns);
    }

    public function findWithPaginate($with, $columns = ['*'], $per_page = 20)
    {
        return $this->model->with($with)->select($columns)->paginate($per_page);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function incrementBy($field, $value, $incrementField, $increment = 1)
    {
        return $this->model->where($field, $value)->increment($incrementField, $increment);
    }
}