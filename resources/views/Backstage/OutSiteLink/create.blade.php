@extends('Backstage.layouts.master')

@section('title', 'HOME')

@section('content')
    <div class="container-fluid">
        <h1 style="text-align: center">外部網站網址</h1>
        <form action="{{route('store.OutSiteLink')}}" method="POST" id="OutSiteLinkForm" role="form" enctype="multipart/form-data"
              style="margin-bottom: 16px" onsubmit="return validateForm()">
            {{ csrf_field() }}
            <div class="form-group">
                <label>FB網址：</label>
                <input name="Facebook" class="form-control" placeholder="請輸入FB網址">
            </div>
            <div class="form-group">
                <label>Youtube網址：</label>
                <input name="Youtube" class="form-control" placeholder="請輸入單價">
            </div>
            <div class="text-left">
                @if($OutSiteLink->isEmpty())
                    <button type="submit" class="btn btn-success" id="createButton">新增</button>
                @else
                    <button type="submit" class="btn btn-success" id="createButton" disabled>新增</button>
                @endif
            </div>
        </form>
        <table class="table" id="LinkTable">
            <thead>
            <tr>
                <th scope="col">FB網址</th>
                <th scope="col">Youtube網址</th>
                <th scope="col">修改/刪除</th>
            </tr>
            </thead>
            <tbody>
            @foreach($OutSiteLink as $OutSiteLinks)
                <tr>
                    <td class="align-middle">{{$OutSiteLinks->Facebook}}</td>
                    <td class="align-middle">{{$OutSiteLinks->Youtube}}</td>
                    <td class="align-middle">
                        <a href="{{route('show.OutSiteLink.updateForm',$OutSiteLinks->id)}}" class="btn btn-success"
                           style="display: inline-block">修改</a>
                        <form class="delete" action="{{route('destroy.OutSiteLink',$OutSiteLinks->id)}}" method="POST"
                              onsubmit="return ConfirmDelete()" style="display: inline-block; margin: 0;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <input type="submit" class="btn btn-danger" value="刪除">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <script>
            function validateForm() {
                var FB = document.forms["OutSiteLinkForm"]["Facebook"].value;
                var YT = document.forms["OutSiteLinkForm"]["Youtube"].value;
                if (FB == "" && YT == "") {
                    alert("請至少填一項資料在送出");
                    return false;
                }
            }

            function ConfirmDelete() {
                var x = confirm("你確定要刪除此網址嗎?");
                if (x)
                    return true;
                else
                    return false;
            }
        </script>
    </div>
@endsection
