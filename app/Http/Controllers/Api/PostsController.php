<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\posts;

class PostsController extends Controller
{
    public function index()
    {
        $posts = posts::get();
        $msg =['ok'];
        return response($posts,200,$msg);
    }
}
