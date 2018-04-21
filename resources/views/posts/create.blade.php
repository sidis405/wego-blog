@extends('layouts.app')

@section('content')

<div>

    @include('layouts.errors')

    <div class="page-header">
      <h1>Create a new post</h1>
    </div>

    <div>
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="preview">Preview</label>
                <textarea class="form-control" name="preview"  value="{{ old('preview') }}"></textarea>
            </div>
            <div class="form-group">
                <label for="body">Article Content</label>
                <textarea class="form-control" name="body" rows="10">{{ old('body') }}</textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control">
                    <option></option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                @if($category->id == old('category_id'))
                                    selected=""
                                @endif
                            >{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags[]">Tags</label>
                <select name="tags[]" class="form-control" multiple="">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}"
                            @if(in_array($tag->id, old('tags', [])))
                                selected=""
                            @endif
                            >{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Publish article</button>
        </form>
    </div>

</div>

@stop
