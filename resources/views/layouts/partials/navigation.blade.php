<div class="wrapper">
    <nav style="background-color: #FFFFFF">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
              integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
              crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{asset('css/navigation.css')}}" rel="stylesheet" type="text/css" media="all">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/csshake/1.5.3/csshake.min.css"/>

        <!--navigation-->
        <div class="float-navigation">
            <ul class="number">
                <li style="float: left;padding: 14px 50px;font-size: large;">新社香菇</li>
                @if(Auth::check())
                    <li class="dropdown-right-top"
                        style="color: black;text-decoration: none;padding: 14px 50px;border-radius: 10px;">
                        {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                        <ul>
                            <li><a href="{{ route('Logout_New') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    登出
                                </a>
                            </li>
                        </ul>
                        <form id="logout-form" action="{{ route('Logout_New') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('register') }}">註冊</a></li>
                    <li><a href="{{ route('login') }}">登入</a></li>
                @endif
            </ul>
            <ul class="list">
                <li class="list-li"><a href="#index" class="list-li-a">首頁</a></li>
                <li class="list-li"><a href="#history" class="list-li-a">歷史</a></li>
            </ul>
        </div>
    </nav>
</div>