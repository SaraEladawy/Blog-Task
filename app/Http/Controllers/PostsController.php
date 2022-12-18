<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        if (auth()->user()->role->name == 'admin') {
            $posts = Post::get();
        } else {
            $posts = Post::where('user_id', auth()->id())->get();
        }

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        Post::create($request->input() + ['user_id' => auth()->id()]);

        return redirect()->route('posts.index')->with('success', 'Post Created Successfully!');
    }

    public function edit(Post $post)
    {
        if ($post->user_id != auth()->id()) {
            return redirect()->route('posts.index')->withErrors('Not Authorize');
        }
        return view('posts.edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->input());

        return redirect()->route('posts.index')->with('success', 'Post is updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post is Deleted successfully');
    }
}
