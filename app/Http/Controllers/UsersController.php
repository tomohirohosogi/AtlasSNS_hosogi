<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\User;
use App\Post;
use Illuminate\Validation\Rule;


class UsersController extends Controller
{
    //
    public function profile($id){

        $userpost = Post::where('user_id', $id)->get();
        $userdate = User::where('id',$id)->get();
        return view('users.profile',compact('id','userpost','userdate'));
    }
    //ユーザー検索と結果表示
    public function index(Request $request) {
      #キーワード受け取り
      $keyword = $request->input('keyword');

      $query = User::query();

      //ユーザー検索検索

      if(!empty($keyword))
        {
            $query->where('username','like',"%{$keyword}%");

        }
      $users = $query->get();

      return view('users.search',['users'=>$users,])->with('keyword',$keyword);

    }

    public function follow(User $user){
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following) {
            // フォローしていなければフォローする
            $follower->followup($user->id);
            return back();
        }
    }
    // フォロー解除
    public function unfollow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollows($user->id);
            return back();
        }
    }



    //プロフィール表示
    public function show(Request $request,user $user)
    {
        return view('users.edit',compact('user'));
    }


    public function profileUpdate(Request $request,user $user)
    {
        $input=$request->validate([
            'username'=>'required|between:2,12',
            'mail'=>'required|email|between:5,40',
            'password'=>'alpha-num|between:8,20',
            'password_confirmation'=>'alpha-num|between:8,20|same:password',
            'bio'=>'max:150',
            'images'=>'file|image|max:1024'
        ]);

        $image = $request->file('images');

        $user->username = $input['username'];
        $user->mail = $input['mail'];
        $user ->password = bcrypt($input['password']);
        if(!empty($image)){
            $image_path=$image->store('public/images');
            $user->images=basename($image_path);
        }

        $user ->bio = $input['bio'];
        $user->save();

        return redirect('/top');


    }

    public function timeline() {
        $posts = User::query()->whereIn('id', Auth::user()->follows()->pluck('following_id'))->latest()->get();


        return view('users.search')->with([
            'posts' => $posts,
        ]);
    }

    public function timelined() {
        $posts = Post::query()->whereIn('id', Auth::user()->followers()->pluck('followed_id'))->latest()->get();
        return view('users.search')->with([
            'posts' => $posts,
        ]);
    }



}
