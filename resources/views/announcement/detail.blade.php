@extends('layouts.master')

@section('title', 'HOME')

@section('content')
    <head>
        <link href="{{asset('css/Announcement-Detail.css')}}" rel="stylesheet">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>公告資訊</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    </head>
    <div class="container-fluid">
        <div class="row title-bar justify-content-center align-items-center">
            <h2>公告資訊</h2>
        </div>
        <div class="container">
            <div class="card">
                <div class="container-fluid">
                    <div class="wrapper row">
                        @foreach($announcementDetail as $announcementDetails)
                            @if($announcementDetails->img == null)
                                <div class="details col-md-12">
                                    <h3 class="announcement-title-NoImg">{{$announcementDetails->title}}</h3>
                                    <h4 class="announcement-content-NoImg">公告內容：</h4>
                                    <p class="product-description">{!! $announcementDetails->content !!}</p>
                                </div>
                            @else
                                <div class="preview col-md-6">
                                    <div class="preview-pic tab-content">
                                        <div class="cover">
                                            <div class="tab-pane active" id="pic-1"><img class="img-thumbnail" src="{{url('../img/announcement/' . $announcementDetails->img)}}"/></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="details col-md-6">
                                    <h3 class="announcement-title">{{$announcementDetails->title}}</h3>
                                    <h4 class="announcement-content">公告內容：</h4>
                                    <p class="product-description">{{$announcementDetails->content}}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection