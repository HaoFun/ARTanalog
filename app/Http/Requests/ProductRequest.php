<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\BaseRequest;

class ProductRequest extends BaseRequest
{
    public function rules()
    {
        switch ($this->route()->getName()) {
            case 'admin.product.store':
                return [
                    'title_cn' => 'required|min:3',
                    'title_en' => 'required|min:3',
                    'title_jp' => 'required|min:3',
                    'content_cn' => 'required|min:3',
                    'content_en' => 'required|min:3',
                    'content_jp' => 'required|min:3',
                    'tag_id'  => 'required|exists:tags,id',
                ];
            case 'admin.product.update':
                return [
                    'title_cn' => 'required|min:3',
                    'title_en' => 'required|min:3',
                    'title_jp' => 'required|min:3',
                    'content_cn' => 'required|min:3',
                    'content_en' => 'required|min:3',
                    'content_jp' => 'required|min:3',
                    'tag_id'  => 'required|exists:tags,id',
                ];
            default:
                return [];
        }
    }
}
