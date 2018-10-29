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
            @foreach($introductionList as $introductionLists)
                <?php $count -= 1;?>
            <div class="row introduction-title justify-content-center align-items-center">
                <h3>{{$introductionLists->title}}</h3>
            </div>
            <div class="row introduction-content justify-content-center align-items-center">
                <div class="col-6 thumbnail introduction-img">
                    <img src="{{url('../img/Xinshe/' . $introductionLists->img)}}" alt="此介紹尚未有圖片" style="width: 80%;height: 80%">
                </div>
                <div class="col-6">
                    {{$introductionLists->AboutXinshe}}
                </div>
            </div>
                @if(!$count == 0)
                    <hr class="style-two"/>
                @endif
            @endforeach
        </div>
    </div>
</div>
</body>
@endsection