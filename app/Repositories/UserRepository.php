<?php

namespace App\Repositories;

use App\Repositories\Abstracts\BaseAbstract;

class UserRepository extends BaseAbstract
{
    public function model()
    {
        return 'App\Models\User';
    }

    public function create(array $data)
    {
        return parent::create(array_merge($data, [
            'api_key' => str_random(32)
        ]));
    }
}