<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'slug';
    public $incrementing = false;

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id', 'id');
    }
}
