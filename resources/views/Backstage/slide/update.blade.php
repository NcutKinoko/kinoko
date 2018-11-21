@extends('Backstage.layouts.master')

@section('title', 'HOME')

@section('content')
    <div class="container-fluid">
        <h1 style="text-align: center">修改主頁幻燈片</h1>
        @foreach($updateSlide as $updateSlides)
            <form action="{{route('update.slide',$updateSlides->id)}}" method="POST" role="form" enctype="multipart/form-data"
                  style="margin-bottom: 16px">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>修改幻燈片圖</label>
                    <input type="file" class="form-control" name="img" value="{{old('img')}}" placeholder="上傳圖片">
                </div>
                <div class="form-group">
                    <label>圖片網址</label>
                    <input class="form-control" name="url" value="{{$updateSlides->url}}" placeholder="請輸入圖片鏈結">
                </div>
                <div class="text-left">
                    <button type="submit" class="btn btn-success" id="updateButton">修改</button>
                    <a href="{{route('show.slide.form')}}" class="btn btn-danger">返回</a>
                </div>
            </form>
        @endforeach
    </div>
@endsection