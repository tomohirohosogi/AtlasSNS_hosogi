@extends('layouts.logout')

@section('content')

<div id="clear">
  <p class="added_name">{{$name}}さん</p>
  <p class="added_subtitle">ようこそ！AtlasSNSへ！</p>
  <p class="added_p">ユーザー登録が完了しました。</p>
  <p class="added_p">早速ログインをしてみましょう。</p>

  <p class="btn"><a href="/login" class="added_btn">ログイン画面へ</a></p>
</div>

@endsection
