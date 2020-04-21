<?php

namespace App\Http\Controllers;

use App\Post;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['show']]);
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

//        $posts = Post::whereIn('user_id', $users)->orderBy('created_at', 'DESC')->get();
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

        return view('posts.index', compact('posts'));
    }


    public function show(Post $post)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($post->user->id) : false;
        return view('posts.show', compact('post','follows'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {

        $data = \request()->validate([
            'caption' => 'required',
            'image' => 'required | image',
        ]);

        $imagePath = \request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->id());
    }

}
