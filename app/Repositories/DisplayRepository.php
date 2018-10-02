<?php

namespace App\Repositories;

use App\Repositories\Abstracts\BaseAbstract;

class DisplayRepository extends BaseAbstract
{
    public function model()
    {
        return 'App\Models\Display';
    }

    public function first()
    {
        return $this->model->first();
    }
}