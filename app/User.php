<?php

namespace App;

use App\Mail\NewUserWelcomeMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\Types\This;
use Webpatser\Uuid\Uuid;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(
            function ($user) {
                $user->profile()->create([
                    'title' => $user->username,
                    'description' => "Default description ( go edit to change )",
                ]);

                Mail::to($user->email)->send(new NewUserWelcomeMail());
            }
        );
    }

    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
    }

    public function following()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function getPostsCount()
    {
        return Cache::remember(
            'count.posts.' . $this->id,
            now()->addSecond(30), function () {
            return $this->posts->count();
        });
    }

    public function getFollowersCount()
    {
        return Cache::remember(
            'count.followers.' . $this->id,
            now()->addSecond(30), function (){
            return $this->profile->followers->count();
        });
    }

    public function getFollowingCount()
    {
        return Cache::remember(
            'count.following.' . $this->id,
            now()->addSecond(30), function (){
            return $this->following->count();
        });
    }
}
