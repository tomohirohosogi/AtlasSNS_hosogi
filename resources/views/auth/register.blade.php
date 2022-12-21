@extends('layouts.logout')

@section('content')


<section class="loginstile">
  <div class="loginbox">
    {!! Form::open() !!}

    <h2>新規ユーザー登録</h2>

    @if($errors->any())
    @foreach($errors->get('username') as $error)
    <a class="error">{{$error}}</a>
    @endforeach
    @endif

    {{ Form::label('user name') }}
    {{ Form::text('username',null,['class' => 'input']) }}

    @if($errors->any())
    @foreach($errors->get('mail') as $error)
    <a class="error">{{$error}}</a>
    @endforeach
    @endif

    {{ Form::label('mali adress') }}
    {{ Form::text('mail',null,['class' => 'input']) }}

    @if($errors->any())
    @foreach($errors->get('password') as $error)
    <a class="error">{{$error}}</a>
    @endforeach
    @endif

    {{ Form::label('password') }}
    {{ Form::password('password',null,['class' => 'input']) }}



    {{ Form::label('password comfirm') }}
    {{ Form::password('password-confirm',null,['class' => 'input']) }}

    {{ Form::submit('REGISTER') }}

    <p ><a href="/login">ログイン画面へ戻る</a></p>

    {!! Form::close() !!}

  </div>

</section>
@endsection
