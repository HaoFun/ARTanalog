<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title_cn', 'title_en', 'title_jp', 'content_cn', 'content_en',
        'content_jp', 'tag_id'
    ];

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id', 'id');
    }
}
