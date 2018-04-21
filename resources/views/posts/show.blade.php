@extends('layouts.app')

@section('content')

<div>
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
                    {!! $post->preview !!}
                </p>
                <p>
                    {!! $post->body !!}
                </p>
            </div>
            <div class="card-footer">

                <small class="pull-right">
                    Tags: {{ join(', ', $post->tags->pluck('name')->toArray()) }}
                </small>
            </div>
        </article>
</div>

@stop
