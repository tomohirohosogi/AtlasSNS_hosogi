
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
  <div class="">
      <table class='table table-hover'>
        <li>
          <td >
            <img src="{{ asset('storage/images/'.$user->images)}}"alt="{{ $user->images}}" class="user_img">
          </td>
          <td class = "user_name">
          {{ $user->username }}
          </td>
          <td class = "user_post">
          {{ $user->post}}
          </td>
          <td class = "post_at">
            {{$user->created_at}}
          </td>
        </li>
      </table>
  </div>
  @endforeach
</body>
@endsection
