<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;
use App\User;
use App\Follow;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username','mail','password'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    //

    public function follow(User $user) {    // ←この関数追記
        return $this->follows()->save($user);
    }

    //修正

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'following_id');
    }
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id');
    }



    public function followup(Int $user_id)
    {
        return $this->followers()->attach($user_id);
    }

    // フォロー解除する
    public function unfollows(Int $user_id)
    {
        return $this->followers()->detach($user_id);
    }

    // フォローしているか
    public function isFollowing(Int $user_id)
    {

        return (boolean) $this->followers()->where('following_id', $user_id)->exists(['id']);
    }

    // フォローされているか
    public function isFollowed(Int $user_id)
    {
        return (boolean) $this->follows()->where('followed_id', $user_id)->exists(['id']);
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'following_id');
    }




}
