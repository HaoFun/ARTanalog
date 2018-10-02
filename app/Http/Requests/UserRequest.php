<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\BaseRequest;

class UserRequest extends BaseRequest
{
    public function rules()
    {
        switch ($this->route()->getName()) {
            case 'admin.user.store':
                return [
                    'name' => 'required|max:50|unique:users,name',
                    'email' => 'required|email|max:255|unique:users,email',
                    'password' => 'required|min:6|confirmed',
                    'is_action' => 'required|in:0,1'
                ];
            case 'admin.user.update':
                return [
                    'name' => 'required|max:50|unique:users,name,' .
                        $this->route()->parameter('user')->id,
                    'email' => 'required|email|max:255|unique:users,email,' .
                        $this->route()->parameter('user')->id,
                    'password' => 'nullable|min:6|confirmed',
                    'is_action' => 'required|in:0,1'
                ];
            default:
                return [];
        }
    }
}
