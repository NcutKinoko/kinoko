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
        }

        .number > li > ul {
            list-style-type: none;
            padding: 14px 16px;
            margin: 0;
        }

        .number > li > ul > li {
            position: relative;
            width: 50px;
            height: 20px;
            padding: 5px;
        }

        .number > li > ul:hover  .number > li > ul > li{
            display: none;
        }

        .number > li > a:hover {
            background-color: white;
            color: #AA7700;
            font-weight: bold;
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
        @if(Auth::check())
        @else
            <ul class="number">
                <li><a href="#register" class="number-li-a">註冊</a></li>
                <li><a href="#login" class="number-li-a">登入</a></li>
                <li style="display: inline-block;color: black;text-decoration: none;padding: 14px 50px;border-radius: 10px;">
                    登出<i class="fa fa-caret-down"></i>
                    <ul>
                        <li>登出</li>
                        <li>喔喔</li>
                        <li>好喔</li>
                    </ul>
                </li>
                <li style="float: left;padding: 14px 50px;font-size: large;">新社香菇</li>
            </ul>
        @endif

        <ul class="list">
            <li class="list-li"><a href="#index" class="list-li-a">首頁</a></li>
            <li class="list-li"><a href="#history" class="list-li-a">歷史</a></li>
        </ul>
    </div>
</navigation>