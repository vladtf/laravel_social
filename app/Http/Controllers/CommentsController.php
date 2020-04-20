<?php

namespace App\Http\Controllers;

use App\Post;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Post $post)
    {
        $data = \request()->validate([
            'comment' => 'required | max:56',
        ]);

        auth()->user()->comments()->create([
            'comment' => $data['comment'],
            'post_id' => $post->id,
        ]);

        return redirect("/p/$post->id");
    }

}
