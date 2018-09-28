<?php

namespace App\Repositories;

use App\Repositories\Abstracts\BaseAbstract;

class TagRepository extends BaseAbstract
{
    public function model()
    {
        return 'App\Models\Tag';
    }
}