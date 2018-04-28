@can('update', $post)
    <small><a class="btn btn-link" href="{{ route('posts.edit', $post) }}">Modifica</a></small>
@endcan
@can('delete', $post)
    <form action="{{ route('posts.destroy', $post) }}" method="POST">
        @csrf
        @method("DELETE")
        <button class="btn btn-link" onclick="return confirm('Are you sure?');" type="submit">Rimuovi</button>
    </form>
@endcan
