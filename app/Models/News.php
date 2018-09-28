<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title_cn', 'title_en', 'title_jp', 'content_cn', 'content_en',
        'content_jp', 'publish_at'
    ];

    protected $dates = [
        'publish_at'
    ];
}
