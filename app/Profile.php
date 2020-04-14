<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/YGDfIj3hyJP9MK9UzIr0Ji4JQFHzh5p6udZVsZ0I.png';
        return '/storage/' .  $imagePath;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
