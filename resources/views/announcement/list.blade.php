@extends('layouts.master')

@section('title', 'HOME')

@section('content')
    <head>
        <link href="{{asset('css/Announcement-List.css')}}" rel="stylesheet">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>公告資訊</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    </head>
    <div class="container-fluid">
        <div class="row title-bar justify-content-center align-items-center">
            <h2>公告資訊列表</h2>
        </div>
        <div class="container">
            <div class="card">
                <div class="container-fluid">
                    <div class="wrapper row">
                        <table style="width: 100%">
                            @foreach($AnnouncementList as $AnnouncementLists)
                                <tr>
                                    <td>
                                        <a href="{{route('announcement.detail',$AnnouncementLists->id)}}">{{$AnnouncementLists->announcementCategoryName}}</a>
                                    </td>
                                    <td>
                                        <a href="{{route('announcement.detail',$AnnouncementLists->id)}}">{{$AnnouncementLists->title}}</a>
                                    </td>
                                    <?php $NewDate = explode(' ', $AnnouncementLists->created_at)?>
                                    <td>
                                        <span><a style="color: white" href="{{route('announcement.detail',$AnnouncementLists->id)}}">{{$NewDate['0']}}</a></span>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection