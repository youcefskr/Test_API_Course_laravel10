<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\posts;

class PostsController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $posts = posts::get();

        return $this->apiResponse($posts,'ok',200);
    }
}
