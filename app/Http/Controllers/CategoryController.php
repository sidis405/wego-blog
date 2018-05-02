<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $posts = Post::where('category_id', $category->id)
        ->with('user', 'category', 'tags')->latest()->paginate(15);

        return view('categories.index', compact('posts', 'category'));
    }
}
