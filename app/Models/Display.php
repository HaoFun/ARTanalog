<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Display extends Model
{
    protected $fillable = [
        'corporation_cn', 'corporation_en', 'corporation_jp',
        'zip_code', 'address_cn', 'address_en', 'address_jp',
        'logo', 'display_image', 'tel', 'fax'
    ];
}
