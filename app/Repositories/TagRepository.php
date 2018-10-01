<?php

namespace App\Repositories;

use App\Repositories\Abstracts\BaseAbstract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class TagRepository extends BaseAbstract
{
    protected $parent = [];
    protected $child = [];

    public function model()
    {
        return 'App\Models\Tag';
    }

    public function create(array $data)
    {
        if (!$data['parent_id']) {
            $data['parent_id'] = null;
        }
        return parent::create($data);
    }

    public function tagList($columns = ['*'])
    {
        if ($parent = $this->model->whereNull('parent_id')->get($columns)) {
            $this->getList($parent, $columns);
        }
        ksort($this->child);
        return $this->child;
    }

    public function parentList($id, $columns = ['*'])
    {
        if ($tag = $this->model->find($id, $columns)) {
            $this->getParent($tag, $columns);
        }
        return $this->parent;
    }

    public function getList(Collection $collection, $columns = ['*'], $index = 0)
    {
        $collection->map(function ($item) use ($columns, $index) {
            if ($child = $this->model->where('parent_id', $item->id)->get($columns)) {
                $this->getList($child, $columns, ++$index);
            }
            $this->child[$index][] = $item;
        });
    }

    public function existsChildAndProduct($id)
    {
        $message = '';
        $tag = $this->model->where('parent_id', $id)->get();
        if ($tag->count()) {
            $message .= ('Tag : ' . implode(', ', $tag->pluck('name_cn')->toArray()));
        }
        $product = app(ProductRepository::class)->getProductByTag($id);
        if ($product->count()) {
            $message .= ('Product : ' . implode(', ', $product->pluck('title_cn')->toArray()));
        }
        return $message;
    }

    public function getParent(Model $model, $columns = ['*'], $index = 0)
    {
        ++$index;
        if ($model->parent_id) {
            $this->getParent($model->tag, $columns, $index);
        }
        $this->parent[$index][] = $model;
    }
}