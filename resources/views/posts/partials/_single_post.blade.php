<article class="card" style="margin-bottom: 10px">
    <div class="card-header">
        <div><img src="{{ $post->cover }}" style="width: 100%"></div>
        <h2><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h2>
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
    </div>
    <div class="card-footer">

        <small class="pull-right">
            Tags: {!! join(', ', $post->tags->pluck('url')->toArray()) !!}
        </small>

        {{-- <small class="pull-right">
            Tags: {!! join(', ', $post->tags->map(function($tag){
                return "<a href='" . route('tags.show', $tag).  "'>{$tag->name}</a>";
            })->toArray()) !!}
        </small> --}}
    </div>
</article>
