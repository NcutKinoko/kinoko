<div class="padding">

</div>
<div class="wrapper">
    <nav style="background-color: #FFFFFF">
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
                        <li><a href="{{ route('register') }}" style="color: #AA7700">註冊</a></li>
                        <li><a href="{{ route('login') }}" style="color: #AA7700">登入</a></li>
                @endif
            </ul>
            <ul class="list">
                <li class="list-li"><a href="/index" class="list-li-a">首頁</a></li>
                <li class="list-li"><a href="#history" class="list-li-a">歷史</a></li>
                <li class="list-li"><a href="{{route('product.list')}}" class="list-li-a">產品列表</a></li>
            </ul>
        </div>
    </nav>
</div>