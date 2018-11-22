<!--navigation-->
<script type="text/javascript">

</script>
<nav class="navbar  container-fluid"
     style="background-color: #9E5007; position: fixed;z-index: 999; border-bottom: 2px solid #FFCC33">
    <ul class="headtitle">
        <li><a href="{{route('show.index')}}">新社香菇</a></li>
    </ul>
    <ul class="headinfo">
        @foreach($OutSiteLink as $OutSiteLinks)
        <li style="border-right: none"><a href="{{$OutSiteLinks->Youtube}}" title="YotTube"><img alt="YotTube" src="{{url('../img/icon/youtube.png')}}"
                                                                       height="25px" width="25px"></a></li>
        <li><a href="{{$OutSiteLinks->Facebook}}" title="粉絲專頁連結"><img alt="粉絲專頁連結" src="{{url('../img/icon/FB.png')}}" height="25px" width="25px"></a></li>
        @endforeach
            @if($OutSiteLink->isEmpty())
                <li style="border-right: none"><a href="http://www.ssfa.com.tw/default2.aspx?EpfJdId9UuCM43XlWesODdishmL3WQld" title="新社農會網站"><img alt="新社農會網站" src="{{url('../img/icon/xinshe.png')}}" height="25px" width="25px"></a></li>
                @else
                <li><a href="http://www.ssfa.com.tw/default2.aspx?EpfJdId9UuCM43XlWesODdishmL3WQld" title="新社農會網站"><img alt="新社農會網站" src="{{url('../img/icon/xinshe.png')}}" height="25px" width="25px"></a></li>
            @endif
            @foreach($CountResult as $CountResults)
                <li style="width: auto;"><h6 style="color: #FFFFFF; margin: 4px 20px 4px 0; width: auto;">網站瀏覽次數：{{$CountResults->count}}</h6></li>
            @endforeach
    </ul>
    <ul class="headstyle">
        <li><a href="{{route('show.index')}}">首頁</a></li>
        <li><a href="{{route('announcement.list')}}">公告訊息</a></li>
        <li><a href="{{route('product.list')}}">產品介紹</a></li>
        <li><a href="{{route('process.list')}}">產品生產流程</a></li>
        <li><a href="{{route('menu.list')}}">香菇菜餚</a></li>
        <li><a href="{{route('show.introduction')}}">關於農會</a></li>
        <li><a href="{{route('farmer.list')}}">菇農介紹</a></li>
        <li><a href="{{route('show.kinoko.standard')}}">優質香菇評鑑標準表</a></li>
        <li><a href="{{route('activity_record.list')}}">農會活動</a></li>
    </ul>
</nav>
<div class="padding"></div>
