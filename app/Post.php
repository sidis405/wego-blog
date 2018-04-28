<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'slug';
    public $incrementing = false;

    protected $guarded = [];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'tag_id', 'post_id', 'id', 'id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    //accessors

    public function getCoverAttribute($cover)
    {
        return ($cover) ? '/storage/' . $cover : url('storage/covers/default_cover.jpg');
    }

    // public function getTitleAttribute($title)
    // {
    //     return strtoupper($title);
    // }

    //mutators
    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = str_slug($title);
    }

    public function attachTags(array $tags = [])
    {
        return $this->fresh()->tags()->sync($tags);
    }
}
