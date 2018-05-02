<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;

class TagsController extends Controller
{
    public function show(Tag $tag)
    {
        $posts = Post::with('user', 'category', 'tags')->whereHas('tags', function ($query) use ($tag) {
            $query->where('tags.id', $tag->id);
        })
        ->latest()->paginate(15);

        return view('tags.index', compact('posts', 'tag'));
    }
}
