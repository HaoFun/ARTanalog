<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\BaseRequest;

class DisplayRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'corporation_cn' => 'required|max:50',
            'corporation_en' => 'required|max:50',
            'corporation_jp' => 'required|max:50',
            'zip_code'       => 'required|max:7',
            'address_cn'     => 'required|max:100',
            'address_en'     => 'required|max:100',
            'address_jp'     => 'required|max:100',
            'tel'            => 'required|max:30',
            'fax'            => 'required|max:30'
        ];
    }
}
