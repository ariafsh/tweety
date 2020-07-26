<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function show($slug)
    {
        try
        {
            $posts = Post::where('slug', '=', $slug)->get();
            return view('pages.comment', compact('posts'));
        }
        catch (ModelNotFoundException $ex)
        {
            return redirect('/');
        }
    }

    public function save(Request $request)
    {
        $post = Post::Where('slug', '=', $request['slug'])->first();

        if ($post)
        {
            $comment = new Comment();

            $comment->user_id = Auth::user()->id;
            $comment->post_id = $post->id;
            $comment->body = $request['body'];

            $comment->save();

            return redirect()->back();
        }
        return redirect('/');
    }
}
