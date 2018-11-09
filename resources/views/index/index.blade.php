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
                <a href="{{$slideLists->url}}"><img style="width: 100%; height: 50% "
                                                    src="{{url('../img/slide/' . $slideLists->img)}}" alt="Test"/></a>
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
                    <?php $NewDate = explode(' ', $AnnouncementLists->created_at)?>
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

        <div class="row product-slider-row">
            <div class="col-12 Product-Chinese-Title">
                <h3>新產品介紹</h3>
            </div>
            <div class="col-12 Product-English-Title">
                <h3>NEW PRODUCT</h3>
            </div>
            <div class="col-12">
                <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="9000">
                    <div class="carousel-inner row w-100 mx-auto" role="listbox">
                        <?php $count = 0?>
                        @foreach($NewProduct as $NewProducts)
                            <?php $count += 1?>
                            @if($count == 1)
                                <div class="carousel-item col-md-4 active">
                                    <img class="img-fluid mx-auto d-block img-thumbnail" src="{{url('../img/product/' . $NewProducts->img)}}"
                                         alt="slide {{$count}}">
                                    <h4>{{$NewProducts->name}}</h4>
                                </div>
                            @else
                                <div class="carousel-item col-md-4">
                                    <img class="img-fluid mx-auto d-block img-thumbnail" src="{{url('../img/product/' . $NewProducts->img)}}"
                                         alt="slide 2">
                                    <h4>{{$NewProducts->name}}</h4>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                        <i class="fa fa-chevron-left fa-lg text-muted"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
                        <i class="fa fa-chevron-right fa-lg text-muted"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection