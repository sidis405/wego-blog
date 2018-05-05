@extends('layouts.app')

@section('content')

<div>
        <article class="card" style="margin-bottom: 10px">
            <div class="card-header">
                <div><img src="{{ $post->cover }}" style="width: 100%"></div>
                <h2>{{ $post->title }}</h2>
                <small>
                    posted by {{ $post->user->name }}
                    on @datetime($post->created_at)
                    in <a href="{{ route('categories.show', $post->category) }}">{{ $post->category->name }}</a>
                </small>
                @include('posts.partials._edit_remove_button')
            </div>
            <div class="card-body">
                <p>
                    {!! $post->preview !!}
                </p>
                <p>
                    {!! $post->body !!}
                </p>
            </div>
            <div class="card-footer">

                <small class="pull-right">
                    Tags: {!! join(', ', $post->tags->pluck('url')->toArray()) !!}
                </small>
            </div>

            <hr>
        </article>

        <div>
            <h4>Comments</h4>

            {{-- Stampa commenti --}}

            @foreach($post->comments as $comment)
                <div class="card">
                    <div class="card-header">
                        posted by {{ $comment->user->name }}
                    </div>
                    <div class="card-body">
                        {!! $comment->body !!}
                    </div>
                    <div class="card-footer">
                        <small>on @datetime($comment->created_at)</small>
                    </div>
                </div>
            @endforeach

            <div>
                <form action="{{ route('posts.comment', $post) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>What do you think</label>
                        <textarea class="form-control" rows="10" name="body" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
</div>

@stop
