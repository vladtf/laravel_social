<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GithubController extends Controller
{
    public function show()
    {
        return view('auth.github',
            [
                'email'=>\request('email'),
                'username'=>\request('username'),
                'name'=>\request('name'),
        ]);
    }

    public function store()
    {
        $user = request()->validate([
            'email' => ['unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'username' => request('username'),
            'password' => Hash::make(request('password')),
        ]);

        return redirect('/');
    }
}
