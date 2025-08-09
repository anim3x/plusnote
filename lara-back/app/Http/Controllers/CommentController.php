<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function saveComment(Request $request) {
        $comment = new Comment();
        $comment->post_id = $request->input('post_id');
        $comment->comment= $request->input('comment');
        $comment->add_timestamp = date("Y-m-d H:i:s");
        $comment->save();
    }

    public function getComment($post_id) {
        $comments = DB::table('comments')->where('post_id', $post_id)->get(['id', 'comment', 'add_timestamp']);
        return $comments;
    }
}
