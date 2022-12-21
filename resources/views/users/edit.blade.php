@extends('layouts.login')

@section('content')
<div class="edit_box">
    <figure class="edit_icon">
        <img class="edit_img" src="{{asset('storage/images/'.$user->images)}}">
    </figure>
    <form route="profile_edit" method="post" enctype='multipart/form-data' class="edit_form">
    @csrf
        <div class="edit_div">
            <input type="hidden" name="id" value="{{$user->id}}">
        </div>

        @if($errors->any())
        <div>
            <ul>
                @foreach($errors->get('username') as $error)
                <a class="error">{{$error}}</a>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="edit_div">
            <div class="edit_text">username</div>
            <input type="text" name="username" value="{{$user->username}}" class="edit_input">
        </div>

        @if($errors->any())
        <div>
            <ul>
                @foreach($errors->get('mail') as $error)
                <a class="error">{{$error}}</a>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="edit_div">
            <div class="edit_text">mail</div>
            <input type="text" name="mail" value="{{$user->mail}}" class="edit_input">
        </div>

        @if($errors->any())
        <div>
            <ul>
                @foreach($errors->get('password') as $error)
                <a class="error">{{$error}}</a>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="edit_div">
            <div class="edit_text">password</div>
            <input type="password" name="password" class="edit_input">
        </div>

        @if($errors->any())
        <div>
            <ul>
                @foreach($errors->get('password_confirmation') as $error)
                <a class="error">{{$error}}</a>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="edit_div">
            <div class="edit_text"><a>password </a><a>confirm</a></div>
            <input type="password" name="password_confirmation" class="edit_input">
        </div>

        @if($errors->any())
        <div>
            <ul>
                @foreach($errors->get('bio') as $error)
                <a class="error">{{$error}}</a>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="edit_div">
            <div class="edit_text">bio</div>
            <input type="text" name="bio" value="{{$user->bio}}" class="edit_input">
        </div>

        @if($errors->any())
        <div>
            <ul>
                @foreach($errors->get('images') as $error)
                <a class="error">{{$error}}</a>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="edit_div">
            <div class="edit_text">images</div>

            <label class="file_uprode">
                ファイルを選択して下さい
                <input class="edit_file" type="file" name="images" value="" >
            </label>
        </div>
        <div class="edit_btn">
            <input type="submit" value="更新" class="edit_button"href="/top">
        </div>


    </form>
</div>


@endsection
