@extends('Backstage.layouts.master')

@section('title', 'HOME')

@section('content')
    <div class="container-fluid">
        <h1 style="text-align: center">公告</h1>
        @foreach($updateAnnouncement as $updateAnnouncements)
        <form action="{{route('update.announcement',$updateAnnouncements->id)}}" method="POST" role="form" enctype="multipart/form-data" style="margin-bottom: 16px">
            {{ csrf_field() }}
            <div class="form-group">
                <label>標題：</label>
                <input name="title" class="form-control" placeholder="請輸入標題" value="{{$updateAnnouncements->title}}" required>
            </div>
            <div class="form-group">
                <label>公告類別：</label>
                <select name="announcement_category_id" class="form-control" required>
                    @if($updateAnnouncements->announcement_category_id == 0)
                        <option value="0" selected="selected">此公告未分類</option>
                    @endif
                    @foreach($AnnouncementCategoryList as $AnnouncementCategoryLists)
                        @if($AnnouncementCategoryLists->id == $updateAnnouncements->announcement_category_id)
                            <option value="{{$AnnouncementCategoryLists->id}}" selected="selected">{{$AnnouncementCategoryLists->name}}</option>
                        @else
                            <option value="{{$AnnouncementCategoryLists->id}}">{{$AnnouncementCategoryLists->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>內文：</label>
                <textarea name="content" class="form-control" placeholder="請輸入內文">{{$updateAnnouncements->content}}</textarea>
            </div>
            <div class="form-group">
                <label>上傳公告圖片：</label>
                <input type="file" class="form-control" name="img" value="{{old('img')}}" placeholder="上傳圖片" required>
            </div>
            <div class="text-left">
                <button type="submit" class="btn btn-success" id="updateButton">修改</button>
            </div>
        </form>
            @endforeach
    </div>
@endsection