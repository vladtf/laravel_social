<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index()
    {
        if (\request()->has('search')) {
            $search = \request('search');
            $users = User::where('username', 'like', "%$search%")
                ->paginate(10)
                ->appends('filter', $search);
        } else {
            $users = User::paginate(10);
        }

        return view('profiles.index', [
            'users' => $users,
            'search' => $search ?? ''
        ]);
    }

    public function show(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postsCount = $user->getPostsCount();

        $followersCount = $user->getFollowersCount();

        $followingCount = $user->getFollowingCount();


        return view('profiles.show', compact('user', 'follows', 'postsCount', 'followersCount', 'followingCount'));
    }


    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = \request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'nullable | url',
            'image' => '',
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile()->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }


}
