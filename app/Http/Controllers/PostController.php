<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View|RedirectResponse
     */
    public function index()
    {
        if (Auth::check()) {
            $posts = Post::all();
            return view('posts.index', compact('posts'));
        }
        return $this->unauthorized();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View|RedirectResponse
     */
    public function create()
    {
        if (Auth::check()) {
            return view('posts.create');
        }
        return $this->unauthorized();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'subject' => 'required',
            'content' => 'required'
        ]);

        $data = $request->all();

        Post::create([
            'subject' =>  $data['subject'],
            'content' =>  $data['content'],
            'user_id' =>  Auth::id()
        ]);

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return View|RedirectResponse
     */
    public function edit(Post $post)
    {
        if (Auth::check()) {
            return view('posts.edit', compact('post'));
        }
        return $this->unauthorized();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        $request->validate([
            'subject' => 'required',
            'content' => 'required'
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully');
    }


    /**
     * Redirect user to home because he is not logged in.
     *
     * @return RedirectResponse
     */
    public function unauthorized() :RedirectResponse
    {
        return redirect()->route('/')
            ->with('error', 'You don\'t have access to this');
    }
}
