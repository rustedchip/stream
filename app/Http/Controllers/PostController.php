<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(request $request)
    {
        $post = new Post();
        $post->content = $request->content;
        $post->save();
        return redirect()->back();
    }
    public function manage($post)
    {
        $post = Post::findOrFail($post);
        return view('manage-post',compact('post'));
    }
    public function update(request $request, $post)
    {
        $post = Post::findOrFail($post);
        $post->content = $request->content;
        $post->save();
        return redirect()->back();
    }
    public function delete(request $request, $post)
    {
        $post = Post::findOrFail($post);
        $post->delete();
        return redirect()->route('home');
    }
}
