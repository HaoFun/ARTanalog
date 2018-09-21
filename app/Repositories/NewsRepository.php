<?php

namespace App\Repositories;

use App\Repositories\Abstracts\BaseAbstract;

class NewsRepository extends BaseAbstract
{
    public function model()
    {
        return 'App\Models\News';
    }
}