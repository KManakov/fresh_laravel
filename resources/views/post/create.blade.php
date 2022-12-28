@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('post.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <div class="row-cols-sm-5">
                    <input value="{{old('title')}}" type="text" name="title" class="form-control" id="title" placeholder="title">
                </div>
            </div>
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="content">Content</label>
                <div class="row-cols-sm-5">
                    <textarea name="content" class="form-control" id="content" placeholder="content">{{old('content')}}</textarea>
                </div>
            </div>
            @error('content')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="image">Image</label>
                <div class="row-cols-sm-5">
                    <input value="{{old('image')}}" type="text" name="image" class="form-control mb-3" id="image" placeholder="image">
                </div>
            </div>
            <div>
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <label for="category">Category</label>
                <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm" name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{ old('$category_id') == $category->id ? ' selected' : '' }}
                            value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="tags">Tags</label>
                    <select class="form-select mb-3" multiple aria-label="" id="tags" name="tags[]">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                        @endforeach
                    </select>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
