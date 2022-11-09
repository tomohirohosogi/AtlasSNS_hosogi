<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use Validator;



class PostsController extends Controller
{
    //
    public function index()
    {
        $posts = Post::query()->whereIn('user_id', Auth::user()->followers()->pluck('following_id'))->orWhere('user_id', Auth::user()->id)->latest()->get();

        $list = \DB::table('posts')->get();
        $image = \DB::table('users')-> get();
        return view('posts.index',['posts'=>$posts,'image'=>$image]);

    }
    public function create(Request $request)
    {
        $inputs=$request-> validate([
            'post'=>'required|between:1,200',
        ]);

        $post = new Post;
        $post->post = $inputs['post'];
        $post->user_id=Auth::id();
        $post->save();

        return redirect('top');
    }
    public function delete($id)
    {
        \DB::table('posts')
             ->where('id',$id)
             ->delete();

        return redirect('top');
    }

    public function destroy(Post $post)
    {
        $post -> delete();

        return back();
    }

    public function edit(Request $request)
    {
        $id = $request->post_id;
        $post = $request->repost;
        Post::where('id',$id)->update([
            'post'=>$post
        ]);
        return back();
    }


}
