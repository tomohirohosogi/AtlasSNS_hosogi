
@extends('layouts.login')

@section('content')
<body class="container">
  <div class="list_box">
    <div class="list_title"><p>Folow List</p></div>
    @foreach ($images as $image)
    <section class="plf_img">
      <a class="follower_img" href="/profile/{{$image->id}}"><img class="login_icon"  src="{{ asset('storage/images/'.$image->images)}}"alt="{{ $image->images}}" >{{$image->user_id}}</a>
    </section>
    @endforeach
  </div>
  @foreach ($users as $user)
  <div class='follower_tb'>
      <ul>
        <li class="follow-block">
          <figure>
            <img src="{{ asset('storage/images/'.$user->images)}}"alt="{{ $user->images}}" class="user_img">
          </figure>

          <div class="foiiow-content">
            <div class="user_box">
              <div class="user_name">{{ $user->username }}</div>
              <div class="post_at">{{$user->created_at}}</div>
            </div>
            <div class = "user_post">
              {{ $user->post}}
            </div>
          </div>




        </li>
      </ul>
  </div>

  @endforeach
</body>
@endsection
