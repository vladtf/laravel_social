<?php

namespace App\Http\Controllers;

use App\Post;

class CommentsController extends Controller
{
    public function store(Post $post)
    {
        $this->middleware('auth');

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
