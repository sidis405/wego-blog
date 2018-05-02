@component('mail::message')
# Hi

The post <strong>"{{ $post->title }}"</strong> was modified by its author {{ $post->user->name }}.

@component('mail::button', ['url' => route('posts.show', $post)])
See Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
