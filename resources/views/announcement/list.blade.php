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
                    <div class="row justify-content-end">
                        <div class="dropdown announcement-category">
                            <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                                公告類別
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{route('announcement.list')}}">所有公告</a>
                                @foreach($AnnouncementCategoryList as $AnnouncementCategoryLists)
                                    <a class="dropdown-item" href="{{route('announcement.group.list',$AnnouncementCategoryLists->id)}}">{{$AnnouncementCategoryLists->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="wrapper row">
                        <table style="width: 100%">
                            @foreach($AnnouncementList as $AnnouncementLists)
                                <tr>
                                    <td style="width: 20%">
                                        <a href="{{route('announcement.detail',$AnnouncementLists->id)}}">{{$AnnouncementLists->announcementCategoryName}}</a>
                                    </td>
                                    <td style="width: 60%">
                                        <a href="{{route('announcement.detail',$AnnouncementLists->id)}}">{{$AnnouncementLists->title}}</a>
                                    </td>
                                    <?php $NewDate = explode(' ', $AnnouncementLists->created_at)?>
                                    <td style="width: 20%">
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