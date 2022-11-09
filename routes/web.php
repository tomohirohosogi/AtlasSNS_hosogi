<?php

use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::get('/top','PostsController@index');

//ログアウトしてログインページへ


//プロフィール
Route::get('/profile/{id}','UsersController@profile')->name('profilelist');

//ユーザー検索
Route::get('/search','UsersController@index');

//フォロー登録
Route::post('search/{user}/follow', 'UsersController@follow')->name('follow');

//フォロー解除
Route::post('search/{user}/unfollow', 'UsersController@unfollow')->name('search.unfollow');

//Route::get('/follow-list','FollowsController@followList');

//フォローしたユーザーの投稿表示
Route::get('/follow-list','FollowsController@timelined');


//フォロワー(フォローされてるユーザー)の投稿表示

//フォローしたユーザー表示
Route::get('/follower-list','FollowsController@used');

//フォロワー(フォローされてるユーザー)表示
Route::get('/follow-list','FollowsController@use');



Route::get ('post/index','PostsController@index');

//投稿実行
Route::post ('post/create','PostsController@create')->name('post.create');

//(アプデで使用不可)投稿削除
Route::get ('post/{id}/delete','PostsController@delete');

//投稿更新
Route::post ('post/update-form','PostsController@edit')->name('posts.edit');

//適用中　更新削除
route::delete('index/{post}','PostsController@destroy')->name('posts.destroy');

Auth::routes();
//フォローリストページ
Route::get('hello', 'PostsController@');

//プロフィール編集画面表示
Route::get('/users/{user}/edit', 'UsersController@show')->name('users.edit');
//プロフィール編集
Route::post('/users/{user}/edit', 'UsersController@profileUpdate')->name('profile_edit');
