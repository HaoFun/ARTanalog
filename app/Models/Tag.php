<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name_cn', 'name_en', 'name_jp', 'content_cn', 'content_en',
        'content_jp', 'icon', 'parent_id'
    ];

    public function tag()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }
}
