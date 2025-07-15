<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function savePost(Request $request) {
        $post = new Post();
        $post->title = $request->input('title');
        $post->curdate = date('Y-m-d');
        // info('title: '.$title);
        $post->save();
    }
}
