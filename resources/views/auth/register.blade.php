@extends('layouts.logout')

@section('content')


<section class="loginstile">
  <div class="loginbox">
    {!! Form::open() !!}

    <h2>新規ユーザー登録</h2>

    {{ Form::label('user name') }}
    {{ Form::text('username',null,['class' => 'input']) }}

    {{ Form::label('mali adress') }}
    {{ Form::text('mail',null,['class' => 'input']) }}

    {{ Form::label('password') }}
    {{ Form::password('password',null,['class' => 'input']) }}

    {{ Form::label('password comfirm') }}
    {{ Form::password('password-confirm',null,['class' => 'input']) }}

    {{ Form::submit('REGISTER') }}

    <p><a href="/login">ログイン画面へ戻る</a></p>

    {!! Form::close() !!}
  </div>
</section>
@endsection
