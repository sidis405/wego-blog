@extends('layouts.app')

@section('content')
<div>
    <div class="page-header">
      <h1>{{ $posts->total() }} posts found in {{ $category->name }}</h1>
    </div>

    {{ $posts->links() }}

    @foreach($posts as $post)
        @include('posts.partials._single_post')
    @endforeach
    {{ $posts->links() }}
</div>

@stop
