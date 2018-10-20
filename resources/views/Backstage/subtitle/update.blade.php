@extends('Backstage.layouts.master')

@section('title', 'HOME')

@section('content')
<div class="container-fluid">
    <h1 style="text-align: center">修改活動副標</h1>
    @foreach($updateSubtitle as $updateSubtitles)
    <form action="{{route('update.subtitle' , $updateSubtitles->id)}}" id="createSubtitle" method="POST" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>副標題</label>
            <input id="name" name="name" class="form-control" placeholder="請輸入副標題" value="{{$updateSubtitles->name}}" required>
        </div>
        <div class="form-group">
            <label>所屬活動</label>
            <select name="activity_id" class="form-control" required>
                @if($updateSubtitles->activity_id == 0)
                    <option value="0" selected="selected">此副標屬於任何活動</option>
                @endif
                @foreach($activityList as $activityLists)
                    @if($activityLists->id == $updateSubtitles->activity_id)
                        <option value="{{$activityLists->id}}" selected="selected">{{$activityLists->name}}</option>
                    @else
                        <option value="{{$activityLists->id}}">{{$activityLists->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="text-left">
            <button type="submit" class="update btn btn-success" id="updateButton">修改</button>
            <a href="{{route('show.subtitle.form')}}" class="btn btn-danger">返回</a>
        </div>
    </form>
    @endforeach
</div>
@endsection