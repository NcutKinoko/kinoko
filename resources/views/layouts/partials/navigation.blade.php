<div class="wrapper">
    <nav style="background-color: #FFFFFF">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
              integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
              crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/csshake/1.5.3/csshake.min.css"/>
        <style>
            .conversation {
                width: 0;
                height: 0;
                border-width: 10px;
                border-style: solid;
                border-color: transparent transparent #FFFFFF transparent;
                display: none;
                position: absolute;
                box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                transform: translateX(10px);
            }

            .float-navigation {
                width: 100%;
                position: fixed;
                top: 0;
                z-index: 1;
            }

            .dropdown-right-top:hover .conversation {
                display: block;
                perspective: 1000px;
                opacity: 0;
                -webkit-animation-name: menu;
                -webkit-animation-duration: 300ms;
                animation-timing-function: ease-in-out;
                animation-fill-mode: forwards;
            }

            .number {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: sandybrown;
                text-align: right;
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
                border-radius: 10px;
                box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            }

            .dropdown-right-top > ul > li {
                padding: 12px 16px;
                position: relative;
                left: 0;
                border-radius: 10px;
            }

            .dropdown-right-top > ul > li > a {
                text-decoration: none;
                color: black;
            }

            .dropdown-right-top:hover > ul {
                display: block;
                perspective: 1000px;
                opacity: 0;
                -webkit-animation-name: menu;
                -webkit-animation-duration: 300ms;
                animation-timing-function: ease-in-out;
                animation-fill-mode: forwards;
            }

            @keyframes menu {
                0% {
                    opacity: 0;
                    transform: rotateY(-90deg) translateY(30px);
                }
                100% {
                    opacity: 1;
                    transform: rotateY(0deg) translateY(0px);
                }
            }

            .dropdown-right-top > ul > li:hover {
                background-color: #f9f9f9;
            }

            .list {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: sandybrown;
                text-align: center;
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
                animation: shake 0.82s cubic-bezier(.36, .07, .19, .97) both;

                backface-visibility: hidden;

                perspective: 1000px;
            }

            @keyframes shake {

                10%, 90% {

                    transform: rotate(-2deg);

                }

                20%, 80% {

                    transform: rotate(2deg);

                }

                30%, 50%, 70% {

                    transform: rotate(-2deg);

                }

                40%, 60% {

                    transform: rotate(2deg);

                }

            }
        </style>

        <!--navigation-->
        <div class="float-navigation">
            <ul class="number">
                <li style="float: left;padding: 14px 50px;font-size: large;">新社香菇</li>
                @if(Auth::check())
                    <li class="dropdown-right-top"
                        style="color: black;text-decoration: none;padding: 14px 50px;border-radius: 10px;">
                        {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                        <div class="conversation"></div>
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