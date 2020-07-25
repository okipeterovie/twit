<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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

    public function getAvatarAttribute ($value)
    {
        return asset ($value?: '/images/default_avatar.jpg');
    }

    public function timeline()
    {
        $ids = $this->follows()->pluck('id');
        $ids -> push($this->id);

        return Tweet::whereIn('user_id', $ids)->latest()->paginate(3);


    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }
    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function toggleFollow(User $user)
    {
        if ($this->following ($user)){
            return $this->unfollow($user);
        }

        return $this->follow($user);
    }

    public function following (User $user)
    {
        return $this->follows()->where('following_user_id', $user->id)->exists();
    }

    public function follows ()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function path($append =''){
        $path=route('profile', $this->username);
        return $append ? "{$path}/${append}": $path;
    }
}