@extends('layouts.master')

@section('title', 'HOME')

@section('content')
    <head>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{asset('css/index.css')}}" rel="stylesheet">
        <script type="text/javascript" src="{{asset('js/index.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </head>
    <div class="padding"></div>
    <div class="container-fluid container-background-color">
        <!--<div class="row">
            <div class="col-md-12 text-center title-format">
                <h1>產品</h1>
                <h1>PRODUCT</h1>
            </div>
        </div>-->
        <div class="imageslider">
            <a href=""><img style="width: 100%; height: 50% " src="../img/Test.jpg" alt="Test"/></a>
            <a href=""><img style="width: 100%; height: 50% " src="../img/Test2.jpg" alt="Test"/></a>
            <a href=""><img style="width: 100%; height: 50% " src="../img/Test.jpg" alt="Test"/></a>
            <a href=""><img style="width: 100%; height: 50% " src="../img/Test2.jpg" alt="Test"/></a>
            <a href=""><img style="width: 100%; height: 50% " src="../img/Test.jpg" alt="Test"/></a>
        </div>
        <br>
        <div style="text-align: center;padding-top: 50%; font-size: medium;  font-weight: bold;font-family: '微軟正黑體', serif; font-size: xx-large">
            <a style="color: #1e7e34">最新消息</a><a style="color: darksalmon">News</a>
        </div>

        <hr>

        <table style="width: 100%">
            <tr>
                <td style="width: 10%">
                    <a href="#">休閒趣事</a>
                </td>
                <td style="width: 80%">
                    <a href="#">今日公告事項</a>
                </td>
                <td style="text-align: right;">
                    <span><a style="color: white" href="#">2018/10/18</a></span>
                </td>
            </tr>
            <tr>
                <td style="width: 10%">
                    <a href="#">休閒趣事</a>
                </td>
                <td style="width: 80%">
                    <a href="#">今日公告事項</a>
                </td>
                <td style="text-align: right;">
                    <span><a style="color: white" href="#">2018/10/18</a></span>
                </td>
            </tr>
        </table>
        <p></p>
        <div style="text-align: right">
            <button>更多最新消息</button>
        </div>

    <!--<div id="carouselProduct" class="carousel slide" data-ride="carousel" data-interval="9000">
            <div class="carousel-inner row w-100 mx-auto" role="listbox">
                <?php $count = 0?>
    @foreach($productList as $productLists)
        <?php $count += 1?>
        @if($count == 1)
            <div class="carousel-item col-md-3 active">
                <img class="img-fluid mx-auto d-block" src="{{url('../img/product/' . $productLists->img)}}" style="height: 300px;width: 500px" alt="slide {{$count}}">
                </div>
                        @else
            <div class="carousel-item col-md-3">
                <img class="img-fluid mx-auto d-block" src="{{url('../img/product/' . $productLists->img)}}" style="height: 300px;width: 500px" alt="slide {{$count}}">
                </div>
                        @endif
    @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselProduct" role="button" data-slide="prev">
                <i class="fa fa-chevron-left fa-lg text-muted"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next text-faded" href="#carouselProduct" role="button" data-slide="next">
                <i class="fa fa-chevron-right fa-lg text-muted"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12 text-center title-format">
                <h1>菜餚</h1>
                <h1>Menu</h1>
            </div>
        </div>
        <br>
        <div id="carouselMenu" class="carousel slide" data-ride="carousel" data-interval="9000">
            <div class="carousel-inner row w-100 mx-auto" role="listbox">
                <?php $count = 0?>
    @foreach($menuList as $menuLists)
        <?php $count += 1?>
        @if($count == 1)
            <div class="carousel-item col-md-3 active">
                <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400/000/fff?text={{$count}}" style="height: 300px;width: 500px" alt="slide 1">
                        </div>
                    @else
            <div class="carousel-item col-md-3">
                <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400/000/fff?text={{$count}}" style="height: 300px;width: 500px" alt="slide 2">
                        </div>
                    @endif
    @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselMenu" role="button" data-slide="prev">
                <i class="fa fa-chevron-left fa-lg text-muted"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next text-faded" href="#carouselMenu" role="button" data-slide="next">
                <i class="fa fa-chevron-right fa-lg text-muted"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>-->
    </div>
    <br>
    <script type="text/javascript">
        $(document).ready(function () {
            var slide = document.getElementsByClassName('imageslider');//取得幻燈片的htmlcollection物件
            var SlideNumber = 0;
            [].forEach.call(slide, function (el) {//取得幻燈片的html物件
                var a = el.getElementsByTagName('a');//取得幻燈片內各別項目的htmlcollection物件
                SlideNumber = (a.length - 1) * 5;//計算總共需要的animation延遲秒數
                [].forEach.call(a, function (NewOne) {//取得幻燈片內各別物件的html物件
                    NewOne.setAttribute('style', '-webkit-animation-delay: ' + SlideNumber + 's;');//設定幻燈片內html物件的animation-delay屬性
                    SlideNumber -= 5;//每換一個物件delay時間就-5秒
                });
            });
        });
    </script>
@endsection