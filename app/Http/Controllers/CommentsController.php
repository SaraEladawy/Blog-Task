<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Post $post)
    {
        $this->middleware('grantAccess:comments-index');

        return view('comments.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Post $post)
    {
        $this->middleware('grantAccess:comments-store');
        if ($this->checkAuthority($post)) {
            return view('comments.create', compact('post'));
        } else {
            return redirect()->route('posts.index')->withErrors('Not Authorize');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CommentRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CommentRequest $request, Post $post)
    {
        $this->middleware('grantAccess:comments-store');
        if ($this->checkAuthority($post)) {
            $post->comments()->create($request->input() + ['user_id' => auth()->id()]);
            return redirect()->route('posts.comments.index', $post->id)->with('success', 'Comment added Successfully');
        } else {
            return redirect()->route('posts.index')->withErrors('Not Authorize');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Post $post, Comment $comment)
    {
        $this->middleware('grantAccess:comments-update');
        if ($this->checkAuthority($post)) {
            return view('comments.edit', compact('post', 'comment'));
        } else {
            return redirect()->route('posts.index')->withErrors('Not Authorize');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CommentRequest  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CommentRequest $request, Post $post, Comment $comment)
    {
        $this->middleware('grantAccess:comments-update');
        if ($this->checkAuthority($post)) {
            $comment->update($request->input());
            return redirect()->route('posts.comments.index', $post->id)->with('success', 'Comment updated Successfully');
        } else {
             return redirect()->route('posts.index')->withErrors('Not Authorize');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post, Comment $comment)
    {
        $this->middleware('grantAccess:comments-delete');
        if ($this->checkAuthority($post)) {
            $comment->delete();
            return redirect()->route('posts.comments.index', $post->id)->with('success', 'Comment Deleted Successfully');
        } else {
            return redirect()->route('posts.index')->withErrors('Not Authorize');
        }
    }

    public function checkAuthority(Post $post)
    {
        return $post->user_id == auth()->id();
    }
}
