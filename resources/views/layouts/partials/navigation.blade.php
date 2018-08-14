<navigation>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .number {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #d1ecf1;
            text-align: right;
            border-radius: 10px;
            font-family: DFKai-sb
        }

        .number > li {
            display: inline-block;
        }

        .number > li > a {
            color: black;
            text-decoration: none;
            border-radius: 10px;
            padding: 14px 50px;
            display: inline-block;
        }

        .number > li > a:hover {
            color: #AA7700;
            background-color: #FFFFFF;
            text-decoration: none;
        }

        .dropdown-right-top {
            cursor: pointer;
        }

        .dropdown-right-top > ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            background-color: #FFFFFF;
            position: absolute;
            z-index: 1;
            display: none;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        }

        .dropdown-right-top > ul > li {
            padding: 12px 16px;
            position: relative;
            left: 0;
        }

        .dropdown-right-top > ul > li>a {
            text-decoration: none;
            color: black;
        }

        .dropdown-right-top:hover > ul {
            display: block;
        }

        .dropdown-right-top>ul>li:hover {
            background-color: #f9f9f9;
        }

        .list {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #AA7700;
            text-align: center;
            border-radius: 10px;
            font-family: DFKai-sb
        }

        .list-li {
            display: inline-block;
        }

        .list-li-a {
            display: inline-block;
            color: black;
            padding: 14px 50px;
        }

        .list-li-a:hover {
            background-color: white;
            color: #AA7700;
            font-weight: bold;
            border-radius: 10px;
            text-decoration: none;
        }
    </style>

    <!--navigation-->
    <div>
        <ul class="number">
            <li style="float: left;padding: 14px 50px;font-size: large;">新社香菇</li>
        @if(Auth::check())
                <li class="dropdown-right-top"
                    style="color: black;text-decoration: none;padding: 14px 50px;border-radius: 10px;">
                    登出 <i class="fa fa-caret-down"></i>
                    <ul>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                登出
                            </a>
                        </li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
        @else
                <li><a href="{{ route('register') }}" >註冊</a></li>
                <li><a href="{{ route('login') }}" >登入</a></li>
        @endif
        </ul>
        <ul class="list">
            <li class="list-li"><a href="#index" class="list-li-a">首頁</a></li>
            <li class="list-li"><a href="#history" class="list-li-a">歷史</a></li>
        </ul>
    </div>
</navigation>