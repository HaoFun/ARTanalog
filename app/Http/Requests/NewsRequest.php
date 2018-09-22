<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\BaseRequest;

class NewsRequest extends BaseRequest
{
    public function rules()
    {
        switch ($this->route()->getName()) {
            case 'admin.news.store':
                return [
                    'title_cn' => 'required|min:3',
                    'title_en' => 'required|min:3',
                    'title_jp' => 'required|min:3',
                    'content_cn' => 'required|min:3',
                    'content_en' => 'required|min:3',
                    'content_jp' => 'required|min:3',
                    'publish_at' => 'required|date'
                ];
            case 'admin.news.update':
                return [
                    'title_cn' => 'required|min:3',
                    'title_en' => 'required|min:3',
                    'title_jp' => 'required|min:3',
                    'content_cn' => 'required|min:3',
                    'content_en' => 'required|min:3',
                    'content_jp' => 'required|min:3',
                    'publish_at' => 'required|date'
                ];
            default:
                return [];
        }
    }
}
