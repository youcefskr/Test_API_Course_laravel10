<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\posts;

class PostsController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $posts = PostResource::collection(posts::get()) ;

        return $this->apiResponse($posts,'ok',200);
    }
    public function show($id)
    {
        $post = posts::find($id);
        if($post)
        {
            return $this->apiResponse(new PostResource($post),'ok',200);
        }
        return $this->apiResponse(null,'The Post Not Found',404);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null,'The Post Not save',400);
        }

        $post =  posts::create($request->all());
        if($post){
            return $this->apiResponse(new PostResource($post),'save',201);
        }

 return $this->apiResponse(null,'The Post Not save',400);
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null,'The Post Not save',400);
        }
        $post = posts::find($id);
        if(!$post)
        {
            return $this->apiResponse(null,'The Post Not Found',404);
        }
        $post->update($request->all());
        if($post)
        {
            return $this->apiResponse(new PostResource($post),'The Post update',201);
        }

    }
}
