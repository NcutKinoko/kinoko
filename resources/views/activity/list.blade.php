@extends('layouts.master')

@section('title', 'HOME')

@section('content')
    <head>
        <link href="{{asset('css/activity.css')}}" rel="stylesheet">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>農會活動</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    </head>
    <div class="container-fluid">
        <div class="row title-bar justify-content-center align-items-center">
            <h2>農會活動</h2>
        </div>
        <div class="container">
            @foreach($ActivityList as $ActivityLists)
                <div class="row title justify-content-center align-items-center">
                    <h2 style="font-weight: bold">{{$ActivityLists->name}}</h2>
                </div>
                <div class="row panel-design">
                    @foreach($SubtitleList as $SubtitleLists)
                        @if($ActivityLists->id == $SubtitleLists->activity_id)
                            <div class="col-12 subtitle-area">
                                <div class="row subtitle justify-content-center align-items-center">
                                    <h3 style="font-weight: bold">{{$SubtitleLists->name}}</h3>
                                </div>
                                <div class="row activity-content">
                                    @foreach($ActivityRecordList as $ActivityRecordLists)
                                        @if($SubtitleLists->id == $ActivityRecordLists->subtitle_id)
                                            <div class="col-xs-6 col-lg-6">
                                                <div class="row activity-img justify-content-center align-items-center">
                                                    <img class="img-thumbnail"
                                                         src="{{url('../img/activity_record/' . $ActivityRecordLists->img)}}"
                                                         alt="此介紹尚未有圖片"
                                                         style="width: 60%;height: 60%">
                                                </div>
                                                <div class="row activity-description justify-content-center align-items-center">
                                                    <h4>{{$ActivityRecordLists->name}}</h4>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                @foreach($countSubtitle as $countSubtitles)
                                    @if($SubtitleLists->activity_id == $countSubtitles->activity_id)
                                        <?php $countSubtitles->count -= 1?>
                                            @if(!$countSubtitles->count == 0)
                                                <hr class="style-two"/>
                                            @endif
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

@endsection

