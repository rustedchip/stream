<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function home()
    {
        $stream = Post::orderBy('created_at', 'desc')->paginate(25);
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
            return redirect()->route('stream');
        }
    }
    public function stream_search_results($query)
    {
        $search = str_replace("+", " ",  $query);
        $stream = Post::where('content', 'LIKE', '%' . $search. '%')->orderBy('created_at', 'desc')->paginate(25);
        return view('home', compact('stream','search'));
    }

    public function admin()
    {
        return view('admin');
    }
}
