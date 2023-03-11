<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AppController extends Controller
{
    public function home()
    {
        $stream = Post::orderBy('created_at', 'desc')->paginate(25);
        if($stream->isEmpty()){
            Session::flash('message', 'Nothing to Show.'); 
        }
        return view('home', compact('stream'));
    }

    public function stream_search(request $request)
    {
        if (isset($request->search)) {
            $search = $request->search;
            $search =  preg_replace('/[^A-Za-z0-9\-]/', ' ', $search);
            $search =  preg_replace('/[\s]+/', ' ', $search);
            $search = rtrim($search);
            $search = str_replace(" ", "+",  $search);
            return redirect()->route('stream-search-results', $search);
        } else {
            Session::flash('message', 'Search has no Results.'); 
            return redirect()->route('home');
        }
    }
    public function stream_search_results($query)
    {
        $search = str_replace("+", " ",  $query);
        $stream = Post::where('content', 'LIKE', '%' . $search. '%')->orderBy('created_at', 'desc')->paginate(25);
        if($stream->isEmpty()){
            Session::flash('message', 'Search has no Results.'); 
        }
        return view('home', compact('stream','search'));
    }
}
