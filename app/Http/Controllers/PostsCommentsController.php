<?php

namespace App\Http\Controllers;

use App\Post;

class PostsCommentsController extends Controller
{
    public function store(Post $post)
    {
        $post->comments()->create(
            [
                'body' => request('body'),
                'user_id' => auth()->id(),
            ]
        );

        return back();
    }
}
