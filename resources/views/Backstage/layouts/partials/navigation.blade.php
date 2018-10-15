<!--navigation-->
<script type="text/javascript">

</script>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                <a class="nav-link" href="{{route('show.product.form')}}">新增產品</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('show.category.form')}}">新增產品類別</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('show.menu.form')}}">新增菜單</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('show.activity.form')}}">新增活動</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('show.subtitle.form')}}">新增活動副標</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('show.activity_record.form')}}">新增圖片標題</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('show.farmer.form')}}">新增菇農資料</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('show.kinoko.form')}}">新增香菇評比標準</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
