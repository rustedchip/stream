<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Google\Cloud\Storage\StorageClient;

class AppController extends Controller
{
    public function home()
    {
        $stream = Post::orderBy('created_at', 'desc')->paginate(25);
        if ($stream->isEmpty()) {
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
        $terms = explode("+", $query);
        $posts = array();

        foreach ($terms as $term) {
            if ((strlen($term)) > 2) {
                $post_query = Post::where('content', 'LIKE', '%' . $term . '%')->get();
                foreach ($post_query as $post) {
                    array_push($posts, $post->id);
                }
            }
        }
        $stream = Post::whereIn('id', $posts)->orderBy('created_at', 'desc')->paginate(25);

        if ($stream->isEmpty()) {
            Session::flash('message', 'Search has no Results.');
        }

        return view('home', compact('stream', 'search'));
    }

    public function about()
    {
        $post = Post::first();
        return view('about', compact('post'));
    }
    public function password()
    {
        return view('password');
    }
    public function password_update(request $request)
    {
        $this->validate($request, [
            'current_password' => 'required|string',
            'new_password' => 'required|confirmed|min:8|string'
        ]);

        $auth = Auth::user();

        if (!Hash::check($request->get('current_password'), $auth->password)) {

            Session::flash('message', 'Current Password is Invalid.');
            return back();
        }

        if (strcmp($request->get('current_password'), $request->new_password) == 0) {
            Session::flash('message', 'New Password cannot be same as your current password.');
            return redirect()->back();
        }

        $user =  User::find($auth->id);
        $user->password =  Hash::make($request->new_password);
        $user->save();

        Session::flash('message', 'Password has been Updated.');
        return back();
    }
}
