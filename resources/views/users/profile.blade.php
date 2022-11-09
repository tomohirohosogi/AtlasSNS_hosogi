@extends('layouts.login')

@section('content')
<body>
  <div>
    @foreach($userdate as $userdate)
    <div  class = "profile_zoon">
      <div class = "profile_icon">
        <img class="login_icon" src="{{asset('storage/images/'.$userdate->images)}}" >
      </div>
      <div>
        <div  class = "profile_date">
          <p class="profile_text">name</p>
          <div>{{$userdate->username}}</div>
        </div>
        <div  class = "profile_date">
          <p class="profile_text">bio</p>
          <div>{{$userdate->bio}}</div>
        </div>
      </div>
      <div class="profile_follow">
        <tr  class = "profile_date">
        @if(auth()->user()->isfollowing($userdate->id))
          <td>
            <form action="{{route('search.unfollow',$userdate)}}" method = "POST">
            @csrf

              <button type = "submit" class = "profile_lift">フォロー解除</button>
            </form>
          </td>
          @else
          <td>
            <form action="{{route('follow',$userdate)}}" method = "POST">
            @csrf
              <button type = "submit" class = "profile_register">フォローする</button>
            </form>
          @endif
          </td>
        </tr>
      </div>

    </div>
    @endforeach

    <table class="profile_table">
    @foreach($userpost as $userpost)
      <tr class="profile_post">
        <td>
          <img src="{{asset('storage/images/'.$userdate->images)}}">
        </td>
        <td>
          <div>{{$userdate->username}}</div>
          <div>{{$userpost->post}}</div>
        </td>
        <td>{{$userpost->created_at}}</td>
      </tr>
    @endforeach
    </table>
  </div>

</body>
@endsection
