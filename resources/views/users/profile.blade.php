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
          <div class="profile_date_name">{{$userdate->username}}</div>
        </div>
        <div  class = "profile_date">
          <p class="profile_text">bio</p>
          <div class="profile_date_name">{{$userdate->bio}}</div>
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

    <div class="">
    @foreach($userpost as $userpost)
      <div>
        <ul>
          <li class="post-block">
            <figure class="img_margin"><img src="{{asset('storage/images/'.$userdate->images)}}"></figure>
            <div class="post-content">
              <div>
                <div class="post-name">{{$userdate->username}}</div>
                <div>{{$userpost->created_at}}</div>
              </div>
              <div>{{$userpost->created_at}}</div>
            </div>
          </li>
        </ul>
      </div>
    @endforeach
    </div>

  </div>

</body>
@endsection
