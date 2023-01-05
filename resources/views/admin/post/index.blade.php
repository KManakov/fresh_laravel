@extends('layouts.admin')

@section('content')
    <div>
        <div>
            <a style="text-decoration: none;" href="{{ route('post.create') }}" class="btn btn-primary mb-3">Add one</a>
        </div>
        @foreach($posts as $post)
            <div><a style="text-decoration: none;" href="{{ route('post.show', $post->id) }}"> {{ $post->id }}. {{ $post->title }}</a></div>
        @endforeach
        <div class="mt-3">
            {{ $posts->withQueryString()->links() }}
        </div>
    </div>
@endsection
