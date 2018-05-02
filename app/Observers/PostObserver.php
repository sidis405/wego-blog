<?php

namespace App\Observers;

use App\Post;
use App\Events\PostWasUpdated;

class PostObserver
{
    public function updated(Post $post)
    {
        event(new PostWasUpdated($post->load('user')));
    }

    public function deleting(Post $post)
    {
        $post->attachTags([]);
    }
}
