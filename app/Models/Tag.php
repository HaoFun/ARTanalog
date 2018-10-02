<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'type', 'name_cn', 'name_en', 'name_jp', 'content_cn', 'content_en',
        'content_jp', 'icon', 'parent_id'
    ];

    protected static $tag_type = [
        '產品介紹', '產品應用'
    ];

    public function tag()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    public static function displayType()
    {
        return self::$tag_type;
    }
}
