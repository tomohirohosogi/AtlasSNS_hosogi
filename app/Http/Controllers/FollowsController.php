<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use App\FollowUser;
use Illuminate\Http\Request;
use Auth;

class FollowsController extends Controller
{
    //

    public function userlist()
    {
        $username = \DB::table('users')->get('username');
        return view('users.search',['username'=>$username]);
    }

    public function timeline() {
        dd('aaa');
        $posts = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('following_id'))->latest()->get();
        return view('follows.followerList')->with([
            'posts' => $posts,
            ]);
        }

    public function timelined() {
        $posts = Post::query()->whereIn('user_id', Auth::user()->followers()->pluck('followed_id'))->latest()->get();
        return view('follows.followList')->with([
            'posts' => $posts,
            ]);
    }

    public function use() {
        $user = User::query();
        $users = $user->leftjoin('posts','users.id','=','user_id')->whereIn('users.id', Auth::user()->followers()->pluck('following_id'))->latest('posts.created_at')->get();

        $images= [];
        foreach(Auth::user()->followers as $follower){
            $images[]=$follower;

        }
        return view('follows.followerList')->with([
            'users' => $users,'images' => $images
            ]);
        }

    public function used() {
        $user = User::query();
        $users = $user->leftjoin('posts', 'users.id','=','user_id')->whereIn('users.id',
        Auth::user()->follows()->pluck('followed_id'))->latest('posts.created_at')->get();

        $images= [];
        foreach(Auth::user()->follows as $follow){
            $images[]=$follow;

        }
        return view('follows.followList')->with([
            'users' => $users,'images' => $images
            ]);
    }


}
