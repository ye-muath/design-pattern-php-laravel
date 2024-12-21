<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(){
        Post::create([
            'title'    => 'title1',
            'content'  => 'content1'
        ]);
    }
}
