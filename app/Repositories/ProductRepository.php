<?php

namespace App\Repositories;

use App\Repositories\Abstracts\BaseAbstract;

class ProductRepository extends BaseAbstract
{
    public function model()
    {
        return 'App\Models\Product';
    }

    public function getProductByTag($id)
    {
        return $this->model->where('tag_id', $id)->get();
    }
}