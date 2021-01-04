<?php

namespace App\Http\Controllers;

use App\Services\Post\PostServiceInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }

    public function index(){
        $posts = $this->postService->all();
        return view("posts.list", ['posts'=>$posts]);
    }

    public function create(Request $request){
        return view("posts.create");
    }

    public function store(Request $request){
        $post = $this->postService->create($request->all());
        return view("posts.create");
    }
}
