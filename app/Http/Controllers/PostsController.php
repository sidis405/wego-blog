<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\User;
use App\Category;
use App\Events\PostWasUpdated;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
        // $this->middleware('auth')->only('create', 'store', 'edit', 'update', 'destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user', 'category', 'tags')->latest()->paginate(15);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->with(compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $post = User::createPostFrom(collect($request->validated())->except('cover')->toArray());
        $post->attachTags($request->get('tags'));

        if ($request->file('cover')) {
            $post->cover = $request->file('cover')->store('public/covers');
            $post->save();
        }

        return redirect()->route('posts.show', $post)
        ->with('status', 'success')
        ->with('message', 'The post has been saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show')->with(compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.edit')->with(compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->authorize('update', $post);

        $post->update(
            collect($request->validated())->except('cover')->toArray()
        );
        $post->attachTags($request->get('tags'));

        if ($request->file('cover')) {
            $post->cover = $request->file('cover')->store('app/public/covers');
            $post->save();
        }

        event(new PostWasUpdated($post->load('user')));

        return redirect()->route('posts.show', $post)
            ->with('status', 'warning')
            ->with('message', 'The post has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        //rimuovere il post
        $post->delete();

        return redirect()->route('posts.index')
        ->with('status', 'danger')
        ->with('message', 'The post has been deleted.');
    }
}
