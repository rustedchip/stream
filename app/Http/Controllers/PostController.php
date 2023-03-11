<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    public function create(request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $post = new Post();
        $post->content = $request->content;
        $post->save();
        Session::flash('message', 'Post has been Created.');
        return redirect()->back();
    }
    public function manage($post)
    {
        $post = Post::findOrFail($post);
        return view('manage-post', compact('post'));
    }
    public function update(request $request, $post)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $post = Post::findOrFail($post);
        $post->content = $request->content;
        $post->save();

        Session::flash('message', 'Post has been Updated.');
        return redirect()->back();
    }
    public function delete(request $request, $post)
    {
        $post = Post::findOrFail($post);
        $post->delete();
        Session::flash('message', 'Post has been Deleted.');
        return redirect()->route('home');
    }
}
