<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }
}
