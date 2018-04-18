<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $casts = [
        'deleted_at' => 'datetime'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}