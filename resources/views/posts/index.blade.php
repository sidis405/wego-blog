@extends('layouts.app')

@section('content')
<div>
    <div class="page-header">
      <h1>Latest posts</h1>
    </div>

    {{ $posts->links() }}

    @foreach($posts as $post)
        <article class="card" style="margin-bottom: 10px">
            <div class="card-header">
                <div><img src="{{ $post->cover }}" style="width: 100%"></div>
                <h2><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h2>
                <small>
                    posted by {{ $post->user->name }}
                    on @datetime($post->created_at)
                    in {{ $post->category->name }}
                </small>
                @include('posts.partials._edit_remove_button')
            </div>
            <div class="card-body">
                <p>
                    {!! $post->preview !!}
                </p>
            </div>
            <div class="card-footer">

                <small class="pull-right">
                    Tags: {{ join(', ', $post->tags->pluck('name')->toArray()) }}
                </small>
            </div>
        </article>
    @endforeach
    {{ $posts->links() }}
</div>

@stop
