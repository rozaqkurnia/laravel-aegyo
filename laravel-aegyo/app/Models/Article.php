<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = false;

    public const DRAFT = 0;
    public const ACTIVE = 1;

    public const PUBLISH = [
        self::DRAFT => 'draft',
        self::ACTIVE => 'publish'
    ];

    public function getRouteKeyName(){
        return 'id';
    }
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    public function getStatusAttribute() {
        return self::PUBLISH[$this->publish];
    }
}
