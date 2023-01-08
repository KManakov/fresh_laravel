<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 10;

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate($perPage, ['*'], 'page', $page);

        return PostResource::collection($posts);

//        $query = Post::query();

//        if (isset($data['category_id'])) {
//            $query->where('category_id', $data['category_id']);
//        }
//
//        if (isset($data['title'])) {
//            $query->where('title', 'like',  "%{$data['title']}%");
//        }
//
//        if (isset($data['content'])) {
//            $query->where('content', 'like',  "%{$data['content']}%");
//        }
//        $posts = $query->get();

//        $posts = Post::paginate(10);

//        return view('post.index', compact('posts'));
    }
}
