<?php

namespace App\Api\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use App\Http\Controllers\Controller;

class ApiPostsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::with('user', 'category', 'tags')->latest()->get();
    }
}
