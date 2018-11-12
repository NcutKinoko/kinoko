@extends('Backstage.layouts.master')

@section('title', 'HOME')

@section('content')
    <div class="container-fluid">
        <h1 style="text-align: center">更新外部網站網址</h1>
        @foreach($UpdateOutSiteLink as $UpdateOutSiteLinks)
        <form action="{{route('update.OutSiteLink',$UpdateOutSiteLinks->id)}}" id="OutSiteLinkForm" method="POST" role="form" enctype="multipart/form-data"
              style="margin-bottom: 16px" onsubmit="return validateForm()">
            {{ csrf_field() }}
            <div class="form-group">
                <label>FB網址：</label>
                <input name="Facebook" class="form-control" placeholder="請輸入FB網址" value="{{$UpdateOutSiteLinks->Facebook}}">
            </div>
            <div class="form-group">
                <label>Youtube網址：</label>
                <input name="Youtube" class="form-control" placeholder="請輸入單價" value="{{$UpdateOutSiteLinks->Youtube}}">
            </div>
            <div class="text-left">
                    <button type="submit" class="btn btn-success" id="createButton">修改</button>
                <a href="{{route('show.OutSiteLink.form')}}" class="btn btn-danger">返回</a>
            </div>
        </form>
        @endforeach
        <script>
            function validateForm() {
                var FB = document.forms["OutSiteLinkForm"]["Facebook"].value;
                var YT = document.forms["OutSiteLinkForm"]["Youtube"].value;
                if (FB == "" && YT == "") {
                    alert("請至少填一項資料在送出");
                    return false;
                }
            }
        </script>
    </div>
@endsection