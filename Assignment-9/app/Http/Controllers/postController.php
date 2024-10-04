<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'contents' => 'required|string|max:500',
        ]);

        $result = Post::create([
            'contents' => $request->input('contents'),
            'user_id'  => Auth::id(),
        ]);

        if ($result) {
            return redirect()->back()->with('success', 'Post created successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to create post, please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post     = Post::find($id);
        $postUser = User::where('id', $post->user_id)->first();

        if (!$post) {
            abort(404, 'Post not found.');
        }

        return view('pages.single_post', compact('postUser', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post     = Post::find($id);
        $postUser = User::where('id', $post->user_id)->first();

        if (!$post) {
            abort(404, 'Post not found.');
        }

        return view('componants.post.edit', compact('postUser', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'contents' => 'required|string',
        ]);

        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Post not found.'], 404);
        }

        // Update the post's contents
        $post->contents = $request->input('contents');

        if ($post->save()) {
            return redirect()->back()->with('success', 'Post updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Post update failed!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        if (!$post) {
            abort(404, 'Post Not Found!');
        }

        if ($post->delete()) {
            return redirect()->back()->with('success', 'Post Deleted Successfully!');
        } else {
            return redirect()->back()->with('error', 'Post Deletion Failed!');
        }
    }

}
