<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('pages.tweet');
     }

    public function save(request $request)
    {
        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->title = $request['title'];
        $post->text = $request['text'];

        $post->save();

        return redirect()->intended('/ ');
     }

    public function show(request $request)
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(6);
        return view('pages.home', compact('posts') );
     }

    public function delete(Request $request)
    {
        auth()->user()->posts()->whereId($request->input('id'))->delete();

        return redirect('/');
     }
}
