@extends('Backstage.layouts.master')

@section('title', 'HOME')

@section('content')
    @foreach($updateActivity_record as $updateActivity_records)
    <div class="container-fluid">
        <h1 style="text-align: center">修改活動圖片</h1>
        <form action="{{route('update.activity_record',$updateActivity_records->id)}}" id="updateActivityRecord" method="POST" role="form"
              enctype="multipart/form-data" style="margin-bottom: 16px">
            {{ csrf_field() }}
            <div class="form-group">
                <label>標題</label>
                <input id="name" name="name" class="form-control" placeholder="請輸入標題" value="{{$updateActivity_records->name}}" required>
            </div>
            <div class="form-group">
                <label>所屬副標題</label>
                <select name="subtitle_id" class="form-control" required>
                    @if($updateActivity_records->subtitle_id == 0)
                        <option value="0" selected="selected">此圖片未有所屬的副標</option>
                    @endif
                    @foreach($subtitleList as $subtitleLists)
                        @if($subtitleLists->id == $updateActivity_records->subtitle_id)
                            <option value="{{$subtitleLists->id}}" selected="selected">{{$subtitleLists->SubtitleName}}</option>
                        @else
                            <option value="{{$subtitleLists->id}}">{{$subtitleLists->SubtitleName}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>圖片</label>
                <input type="file" id="img" name="img" class="form-control" placeholder="請輸選擇圖片" required>
            </div>
            <div class="text-left">
                <button type="submit" class="create btn btn-success" id="createButton">修改</button>
                <a href="{{route('show.activity_record.form')}}" class="btn btn-danger">返回</a>
            </div>
        </form>
        @endforeach
    </div>
@endsection