@extends('layouts.app')

@section('content')
{{ $posts->links() }}
<div>
        <div class="page-header">
          <h1>Latest posts</h1>
      </div>

        @foreach($posts as $post)
            <article class="card" style="margin-bottom: 10px">
                <div class="card-header">
                    <h2>{{ $post->title }}</h2>
                    <small>
                        posted by {{ $post->user->name }}
                        on @datetime($post->created_at)
                        in {{ $post->category->name }}
                    </small>
                </div>
                <div class="card-body">
                    <p>
                        {{ $post->body }}
                    </p>
                </div>
                <div class="card-footer">

                    <small class="pull-right">
                        Tags: {{ join(', ', $posts->first()->tags->pluck('name')->toArray()) }}
                    </small>
                </div>
            </article>
        @endforeach

    </div>

    {{ $posts->links() }}
@stop
