<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head">
          <a href="/top"><img class="atlastitle" href="/top" src="{{asset('images/atlas.png')}}" alt="logo"></a>
            <div id="MyProfil">
                <div  id="MyProfilItem">
                    <p class="login_name"><?php $user = Auth::user(); ?>{{ $user->username }}さん</p>
                </div>

                <div>
                    <div href="#" class="drawer"></div>

                </div>

                <div id="MyProfilItem">
                  <a><img class="login_icon" src="{{ asset('storage/images/'.$user->images)}}" alt="サンプル" width="10" height="auto" ></a>
                </div>

                <!-- <div id="MyProfilItem">
                    <div class="login_menu">
                        <label for="toggle" onclick=""  for="menuToggle">menu</label>
                        <input type="checkbox" id="toggle" autocomplete="off">

                        <ul id="menu">
                            <li class="menu_btn">
                                <a class="home_btn" href="/top" >ホーム</a>
                            </li>
                            <li class="menu_btn">
                                <a class="dropdown-item" href="{{route('users.edit',$user)}}">
                                    <span class="text-primary">プロフィール編集</span>
                                </a>
                            </li>
                            <li>
                                <form action="{{route('logout')}}" methot="post">
                                @csrf
                                <input type="submit" value="ログアウト">
                                </form>
                            </li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </div>
    </header>
    <div id="row">
        <div id="list">
            @yield('content')
        </div >
        <div id="side-bar">
            <ul class="drawer-list">
                        <li class="menu_btn">
                            <a class="home_btn" href="/top" >HOME</a>
                        </li>
                        <li id="dropdown-item" class="menu_btn">
                            <a  href="{{route('users.edit',$user)}}">
                                <span class="text-primary">プロフィール編集</span>
                            </a>
                        </li>
                        <li class="menu_logout">
                            <div>
                                <form action="{{route('logout')}}" methot="post" class="logout">
                                    @csrf
                                    <input type="submit" value="ログアウト">
                                </form>
                            </div>
                        </li>
                    </ul>

            <div id="confirm">
                <p class="sidetop"><?php $user = Auth::user(); ?>{{ $user->username }}さんの</p>
                <p class="sideber">フォロー数</p>
                <p class="sideber">{{ Auth::user()->followers()->get()->count() }}名</p>
                <p class="sideber">
                    <a class="follow_list" href="/follow-list">フォローリスト</a>
                </p>
                <p class="sideber">フォロワー数</p>
                <p class="sideber">{{ Auth::user()->follows()->get()->count() }}名</p>
                <p class="sideber"><a  class="follower_list" href="/follower-list">フォロワーリスト</a></p>
            </div>
            <div class="search_zone">
                <a  class="search_btn" href="/search">ユーザー検索</a>
            </div>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/practice.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
