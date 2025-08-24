<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post;

class PostController extends Controller
{
    public function deletePost(Post $post)
    {
        if ($post->user_id != auth()->id()) {
            abort(403);
        }

        $post->delete();
        return redirect('/');
    }

    public function updatePost(Post $post, Request $request)
    {
        $incomingData = $request->validate([
            'title' => ['required', 'min:3', 'max:100'],
            'body' => ['required', 'min:10', 'max:10000']
        ]);

        $incomingData['title'] = strip_tags($incomingData['title']);
        $incomingData['body'] = strip_tags($incomingData['body']);

        if ($post->user_id != auth()->id()) {
            abort(403);
        }

        $post->update($incomingData);
        return redirect('/'); 
    }
    
    public function showEditScreen(Post $post)
    {
        if ($post->user_id != auth()->id()) {
            abort(403);
        }

        return view('edit-post', ['post' => $post]);
    }

    public function createPost(Request $request)
    {
        $incomingData = $request->validate([
            'title' => ['required', 'min:3', 'max:100'],
            'body' => ['required', 'min:10', 'max:10000']
        ]);

        $incomingData['title'] = strip_tags($incomingData['title']);
        $incomingData['body'] = strip_tags($incomingData['body']);
        $incomingData['user_id'] = auth()->id();
        Post::create($incomingData);

        return redirect('/');
    }
}
