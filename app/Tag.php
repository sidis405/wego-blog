<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'slug';
    public $incrementing = false;

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    protected $appends = [
        'url',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function getUrlAttribute()
    {
        return "<a href='" . route('tags.show', $this).  "'>{$this->name}</a>";
    }
}
