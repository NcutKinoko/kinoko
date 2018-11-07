<!--navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    {{--<a class="navbar-brand" href="#">Navbar</a>--}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @if(\Illuminate\Support\Facades\Auth::guard('backstage')->check())
                <li class="nav-item">
                    <a class="nav-link" href="{{route('Backstage.index')}}">首頁</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        產品
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('show.product.form')}}">新增產品</a>
                        <a class="dropdown-item" href="{{route('show.category.form')}}">新增產品類別</a>
                        <a class="dropdown-item" href="{{route('show.process.form')}}">產品生產流程</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('show.menu.form')}}">新增菜單</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        活動
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('show.activity.form')}}">新增活動</a>
                        <a class="dropdown-item" href="{{route('show.subtitle.form')}}">新增活動副標</a>
                        <a class="dropdown-item" href="{{route('show.activity_record.form')}}">新增圖片標題</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('show.farmer.form')}}">新增菇農資料</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('show.kinoko.form')}}">新增香菇評比標準</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        公告
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('show.announcement_category.form')}}">新增公告類別</a>
                        <a class="dropdown-item" href="{{route('show.announcement.form')}}">新增公告</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('show.xinshe.form')}}">關於新社農會</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('show.slide.form')}}">新增幻燈片</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('show.footer.form')}}">footer資料</a>
                </li>
                @if(\Illuminate\Support\Facades\Auth::guard('backstage')->user()->level_id == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('management.BackstageAuth')}}">會員管理</a>
                    </li>
                @endif
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('Backstage.index')}}">首頁</a>
                </li>
            @endif
        </ul>

        <form class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">
                @if(\Illuminate\Support\Facades\Auth::guard('backstage')->check())
                    <li class="dropdown-right-top"
                        style="color: black;text-decoration: none;padding: 14px 50px;border-radius: 10px;">
                        {{ \Illuminate\Support\Facades\Auth::guard('backstage')->user()->name }} <i
                                class="fa fa-caret-down"></i>
                        <ul>
                            <li>
                                <a class="nav-item" href="{{ route('Logout_New') }}"
                                   onclick="event.preventDefault();
                                                    document.getElementById('logout-backstage').submit();">
                                    {{ __('登出') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('Backstage.show.register') }}">後台會員註冊</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('Backstage.show.login') }}">後台會員登入</a></li>
                @endif
            </ul>
        </form>
        <form id="logout-backstage" action="{{ route('Logout_New') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</nav>
