@extends('layouts.master')

@section('title', 'HOME')

@section('content')
    <head>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{asset('css/index.css')}}" rel="stylesheet">
        <script type="text/javascript" src="{{asset('js/index.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        <title>首頁</title>
    </head>
    <div class="container-fluid container-background-color">
        <div class="imageslider">
            @foreach($slideList as $slideLists)
                <a href="{{$slideLists->url}}"><img style="width: 100%; height: 50% " src="{{url('../img/slide/' . $slideLists->img)}}" alt="Test"/></a>
            @endforeach
        </div>
        <br>
        <div style="text-align: center;padding-top: 50%; font-size: medium;  font-weight: bold;font-family: '微軟正黑體', serif; font-size: xx-large">
            <a style="color: #1e7e34">最新消息</a><a style="color: darksalmon">News</a>
        </div>

        <hr>

        <table style="width: 100%">
            @foreach($AnnouncementList as $AnnouncementLists)
                <tr>
                    <td style="width: 10%">
                        <a href="{{route('announcement.detail',$AnnouncementLists->id)}}">{{$AnnouncementLists->announcementCategoryName}}</a>
                    </td>
                    <td style="width: 80%">
                        <a href="{{route('announcement.detail',$AnnouncementLists->id)}}">{{$AnnouncementLists->title}}</a>
                    </td>
                    <?php $NewDate = explode(' ',$AnnouncementLists->created_at)?>
                    <td style="text-align: right;">
                        <span><a style="color: white" href="#">{{$NewDate['0']}}</a></span>
                    </td>
                </tr>
            @endforeach
        </table>
        <p></p>
        <div style="text-align: right">
            <button>更多最新消息</button>
        </div>
    </div>
    <br>
    <script type="text/javascript">
        $(document).ready(function () {
            var slide = document.getElementsByClassName('imageslider');//取得幻燈片的htmlcollection物件
            var SlideDelayNumber = 0;
            var SlideTotalNumber = 0;
            var SlideFirstNumber = 0;
            var SlideMiddleNumber = 0;
            var SlideLastNumber = 0;
            [].forEach.call(slide, function (el) {//取得幻燈片的html物件
                var a = el.getElementsByTagName('a');//取得幻燈片內各別項目的htmlcollection物件
                SlideDelayNumber = (a.length - 1) * 5;//計算總共需要的animation延遲秒數
                SlideTotalNumber = a.length * 5;//animation需要的秒數
                SlideFirstNumber = 1 / SlideTotalNumber * 100;//計算animation淡入需要的設定值
                SlideMiddleNumber = 5 / SlideTotalNumber * 100;//計算animation顯示需要的設定值
                SlideLastNumber = 6 / SlideTotalNumber * 100;//計算animation淡出需要的設定值
                //在head裡面建立style標籤
                var style = (function () {
                    // Create the <style> tag
                    var style = document.createElement("style");

                    // WebKit hack
                    style.appendChild(document.createTextNode(""));

                    // Add the <style> element to the page
                    document.head.appendChild(style);

                    console.log(style.sheet.cssRules); // length is 0, and no rules

                    return style;
                })();
                //在style標籤內建立animation需要的rule
                style.sheet.insertRule('\
			@keyframes round {\
				' + SlideFirstNumber + '% { opacity: 1; filter: alpha(opacity=100); }\
				' + SlideMiddleNumber + '% { opacity: 1; filter: alpha(opacity=100); }\
				' + SlideLastNumber + '% { opacity: 0; filter: alpha(opacity=0); }\
			}'
                );
                console.log(style.sheet.cssRules);
                [].forEach.call(a, function (NewOne) {//取得幻燈片內各別物件的html物件
                    // NewOne.style.animation = '-webkit-animation: round ' + SlideTotalNumber + 's linear infinite; -webkit-animation-delay: ' + SlideDelayNumber + 's;';
                    NewOne.setAttribute('style', '-webkit-animation: round ' + SlideTotalNumber + 's linear infinite; animation: round ' + SlideTotalNumber + 's linear infinite; -webkit-animation-delay: ' + SlideDelayNumber + 's; animation-delay: ' + SlideDelayNumber + 's;');
                    SlideDelayNumber -= 5;//每換一個物件delay時間就-5秒
                });
            });
        });
    </script>
@endsection