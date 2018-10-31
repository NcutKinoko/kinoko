@extends('layouts.master')

@section('title', 'HOME')

@section('content')
<head>
    <link href="{{asset('css/Xinshe-List.css')}}" rel="stylesheet">
</head>

<body>
<div class="container-fluid" style="margin-bottom: 16px">
    <div class="row title-bar justify-content-center align-items-center">
        <h2>關於農會</h2>
    </div>
    <div class="container">
        <div class="row panel-design">
            <?php $add = 0?>
            @foreach($introductionList as $introductionLists)
                    <?php $add += 1?>
            <div class="row introduction-title justify-content-center align-items-center">
                <h3 style="font-weight: bold">{{$introductionLists->title}}</h3>
            </div>
            <div class="row introduction-content justify-content-center align-items-center">
                @if($add % 2 == 1)
                <div class="col-xs-6 col-lg-6 thumbnail introduction-img">
                    <img src="{{url('../img/Xinshe/' . $introductionLists->img)}}" alt="此介紹尚未有圖片" style="width: 80%;height: 80%">
                </div>
                <div class="col-xs-6 col-lg-6 introduction-text">
                    {{$introductionLists->AboutXinshe}}
                </div>
                    @else
                    <div class="col-xs-6 col-lg-6 introduction-text">
                        {{$introductionLists->AboutXinshe}}
                    </div>
                    <div class="col-xs-6 col-lg-6 thumbnail introduction-img">
                        <img src="{{url('../img/Xinshe/' . $introductionLists->img)}}" alt="此介紹尚未有圖片" style="width: 80%;height: 80%">
                    </div>
                @endif
            </div>
                @if($add !== $count)
                    <hr class="style-two"/>
                @endif
            @endforeach
        </div>
    </div>
</div>
</body>
@endsection