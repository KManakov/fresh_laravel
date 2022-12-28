@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('post.update', $post->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="title">Title</label>
                <div class="row-cols-sm-5">
                    <input type="text" name="title" class="form-control" id="title" placeholder="title" value="{{ $post->title }}">
                </div>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <div class="row-cols-sm-5">
                    <textarea name="content" class="form-control" id="content" placeholder="content">{{ $post->content }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <div class="row-cols-sm-5">
                    <input type="text" name="image" class="form-control mb-3" id="image" placeholder="image" value="{{ $post->image }}">
                </div>
            </div>
            <div>
                <div for="category">Category</div>
                <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm" name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{ $category->id === $post->category->id ? ' selected' : '' }}
                            value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="tags">Tags</label>
                <select class="form-select mb-3" multiple aria-label="" id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option @foreach($post->tags as $postTag)
                                    {{ $tag->id === $postTag->id ? ' selected' : '' }}
                                @endforeach
                            value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
