@extends('layouts.login')
@section('content')
<body class="container">
  @if($errors->any())
  <div>
    <ul>
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <div class="post_space">
    <div>
      <form action="{{route('post.create')}}" method="post" >
        @csrf
        <div>
          <img src="{{ asset('storage/images/'.Auth::user()->images)}}"alt="{{ Auth::user()->images}}" class="user_img"width="10" height="auto">

          <input class="posts" type="text" name= "post" placeholder ="投稿内容を入力してください。" alt="投稿内容を入力してください。">
        </div>
        <button type="submit" class="post_btn"><img src="images/post.png" alt="追加" class="post_img">
        </button>
      </form>
    </div>
  </div>

  <div class="">
    @foreach ($posts as $post)
    <div>
      <ul>
        <li class="post-block">
          <figure><img src="{{ asset('storage/images/'.$post->user->images)}}"alt="{{ $post->user->images}}" class="user_img"width="10" height="auto"></figure>
          <div class="post-content">
            <div>
              <div class="post-name">{{ $post->user->username }}</div>
              <div>{{ $post->created_at }}</div>
            </div>
            <div>{{ $post->post }}</div>

            @if (Auth::user()->id === $post->user_id)
            <div class="my_post">
              <div class="edit_btn" href="/post/{{$post->id}}/update-form">
                <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img class="update_img"src="images/edit.png" alt="更新"></a>
              </div>
              <form action="{{ route('posts.destroy', $post) }}" method="post" class="delete_img">
                @method('delete')
                @csrf
                <button type="submit" class="" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"><img class="delete_img" src="images/trash.png" alt="削除"  height="auto" ></button>
              </form>
            </div>


            @endif
          </div>
        </li>
      </ul>
    </div>
    @endforeach
  </div>
  <div class="modal js-modal">
    <div class="modal__bg js-modal-close"></div>
      <div class="modal__content">
        <form action="{{route('posts.edit')}}" method="post">
          <textarea name="repost" class="modal_post"></textarea>
          <input type="hidden" name="post_id" class="modal_id" value="">
          <div class="modal_edit">
            <input type="image" value="" src="images/edit.png" alt="更新" class="modal_edit_img">
          </div>


          @csrf
        </form>

    </div>
  </div>

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</body>

@endsection
