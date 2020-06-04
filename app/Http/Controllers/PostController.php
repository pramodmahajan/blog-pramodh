<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Resources\Post as PostResource;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return response()->json([
            "success" => true,
            "data" => PostResource::collection($posts)
        ], 200);
    }

   
    public function store(PostRequest $request)
    {

        $request = $request->validated();

        $post = Post::create([
            "title" => $request['title'],
            "content" => $request['content'],
            "status" => $request['status']
        ]);

        return response()->json([
            "success" => true,
        ], 200);
        
    }

    
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return response()->json([
            "success" => true,
            "data" => new PostResource($post)
        ], 200);

    }

    public function update(PostRequest $request, $slug)
    {

        $request = $request->validated();
        $post = Post::where('slug', $slug)->first();

        $post['title'] = $request['title'];
        $post['content'] = $request['content'];
        $post['status'] = $request['status'];

        $post->save();

        return response()->json([
            "success" => true,
        ], 200);

    }

    public function destroy($id)
    {

        $post = Post::where('id', $id)->first();

        $post->delete();

        return response()->json([
            "success" => true,
        ], 200);   
    }
}
