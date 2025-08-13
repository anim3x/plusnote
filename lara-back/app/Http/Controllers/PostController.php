<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function savePost(Request $request) {
        $post = new Post();
        $post->title = $request->input('title');
        $post->curdate = date('Y-m-d');
        $post->description = $request->input('description');
        $post->version = $request->input('version');
        // info('title: '.$post->title);
        $post->save();
    }

    public function getTitle() {
        $posts = DB::table('posts')->orderBy('id', 'desc')->paginate(10, ['id', 'title', 'curdate', 'version']);
        return $posts;
    }

    public function getPost($id) {
        $posts = DB::table('posts')->where('id', $id)->first();
        return $posts;
    }

    public function postCount() {
        $pcount = DB::table('posts')->count();
        return $pcount;
    }
}
