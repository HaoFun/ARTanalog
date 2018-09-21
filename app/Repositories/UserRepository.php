<?php

namespace App\Repositories;

use App\Repositories\Abstracts\BaseAbstract;

class UserRepository extends BaseAbstract
{
    public function model()
    {
        return 'App\Models\User';
    }
}