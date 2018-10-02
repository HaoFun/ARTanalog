<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\BaseRequest;
use App\Models\Tag;

class TagRequest extends BaseRequest
{
    public function rules()
    {
        switch ($this->route()->getName()) {
            case 'admin.tag.store':
                return [
                    'type'    => 'required|in:' . implode(',', Tag::displayType()),
                    'name_cn' => 'required|min:3',
                    'name_en' => 'required|min:3',
                    'name_jp' => 'required|min:3',
                    'content_cn' => 'nullable|min:3',
                    'content_en' => 'nullable|min:3',
                    'content_jp' => 'nullable|min:3',
                    'parent_id'  => 'nullable|exists:tags,id',
                ];
            case 'admin.tag.update':
                return [
                    'type'    => 'required|in:' . implode(',', Tag::displayType()),
                    'name_cn' => 'required|min:3',
                    'name_en' => 'required|min:3',
                    'name_jp' => 'required|min:3',
                    'content_cn' => 'nullable|min:3',
                    'content_en' => 'nullable|min:3',
                    'content_jp' => 'nullable|min:3',
                    'parent_id'  => 'nullable|exists:tags,id',
                ];
            default:
                return [];
        }
    }
}
