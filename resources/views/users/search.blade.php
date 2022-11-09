@extends('layouts.login')

@section('content')
<body>
  <form class="form-inline" action="{{url('/search')}}">
    <div class="form-group">
      <input type="text" name="keyword" value="{{$keyword}}" class="form-control" placeholder="ユーザー名">
      <button type="submit" value="検索" class="btn btn-info"><img class="search_img"src="images/saerch.png" alt="検索"></button>
      <P><?php
          if(!empty($keyword)){
            echo"検索ワード：{$keyword}";
          }
          ?>
        </P>
    </div>
  </form>
  <div>
    <table class="user_table">
      @foreach($users as $user)
      @if(auth()->user()->id != $user->id)
      <tr>
        <td>
          <img src="{{ asset('storage/images/'.$user->images)}}"alt="{{ $user->images}}" class="user_img"width="10" height="auto">
          <a class="font_set">{{$user->username}}</a>
        </td>
        @if(auth()->user()->isfollowing($user->id))
        <td>
          <form action="{{route('search.unfollow',$user)}}" method = "POST">
            @csrf

            <button type = "submit" class = "lift">フォロー解除</button>
          </form>
        </td>
        @else
        <td>
          <form action="{{route('follow',$user)}}" method = "POST">
            @csrf


          <button type = "submit" class = "register">フォローする</button>
          </form>
        @endif

        </td>

      </tr>
      @endif
      @endforeach
    </table>
  </div>

</body>

@endsection
