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
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     * 
     * The goal is to remove them from your API responses.

     * However, you might still use them when you are working with your models in controllers, services... that's why you see them.
     * You can check it works by doing:
     * 
     * $user = User::first(); //hidden attributes included
     * $user->toArray(); // hidden attributes NOT included
     * $user->toJson(); // hidden attributes NOT included
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

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function receivedLikes()
    {
        return $this->hasManyThrough(Like::class, Post::class);
    }

    // Accessor method for Username column
    // when "username" column is accessed, it will be converted into uppercase
    public function getUsernameAttribute($value)
    {
        return strtoupper($value);
    }

    // Mutator for Username column
    // when "Username" will save, it will convert into lowercase
    // public function setUsernameAttribute($value)
    // {
    //     $this->attributes['username'] = strtolower($value);
    // }
}
