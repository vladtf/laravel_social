<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GithubController;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Ramsey\Uuid\Uuid;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function github()
    {
        // send user's request to github
        return Socialite::driver('github')->redirect();
    }

    public function githubRedirect()
    {

        // get oauth request back from github to authenticate user
        $user = Socialite::driver('github')->user();

        // if this user doesn't exists, add them
        // if they do, get the model
        // either way, authenticate the user into the application

        if (User::where('email', $user->getEmail())->first()) {
            $user = User::firstWhere('email', $user->getEmail());
            Auth::login($user, true);
            return redirect('/');
        }

        return redirect()->action('GithubController@show', ['email' => $user->getEmail(), 'name' => $user->getName(), 'username' => $user->getNickname()]);
    }
}
