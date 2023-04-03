<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'likes'])->orderBy('created_at', 'desc')->paginate(6);
        return view('posts.index', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'required'
        ]);

        auth()->user()->posts()->create([
            'status' => $request->status
        ]);
        return back();
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }

    public function likePost(Post $post)
    {
        $post->likes()->create(['user_id' => auth()->id()]);
        return back();
    }

    public function unlikePost(Post $post)
    {
        auth()->user()->likes()->where('post_id', $post->id)->delete();
        return back();
    }
}
