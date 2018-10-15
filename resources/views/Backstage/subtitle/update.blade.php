@extends('Backstage.layouts.master')

@section('title', 'HOME')

@section('content')
<div class="container-fluid">
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
                @if($updateSubtitles->category_id == 0)
                    <option value="0" selected="selected">此產品未分類</option>
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
        </div>
    </form>
    @endforeach
</div>
@endsection