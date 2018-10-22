@extends('Backstage.layouts.master')

@section('title', 'HOME')

@section('content')
<div class="container-fluid">
    <h1 style="text-align: center">修改關於新社農會</h1>
    @foreach($updateXinshe as $updateXinshes)
    <form action="{{route('update.xinshe',$updateXinshes->id)}}" method="POST" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>標題</label>
            <input name="title" class="form-control" placeholder="請輸入標題" value="{{$updateXinshes->title}}" required>
        </div>
        <div class="form-group">
            <label>關於新社</label>
            <textarea name="AboutXinshe" class="form-control" placeholder="請輸入關於新社">{{$updateXinshes->AboutXinshe}}</textarea>
        </div>
        <div class="form-group">
            <label>上傳菇農照片</label>
            <input type="file" class="form-control" name="img" value="{{old('img')}}" placeholder="上傳圖片" required>
        </div>
        <div class="text-left">
            <button type="submit" id="createButton" class="btn btn-success">修改</button>
        </div>
    </form>
        @endforeach
</div>
@endsection