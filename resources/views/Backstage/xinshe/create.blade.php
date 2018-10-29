@extends('Backstage.layouts.master')

@section('title', 'HOME')

@section('content')
    <div class="container-fluid">
        <h1 style="text-align: center">關於新社農會</h1>
        <form action="{{route('store.xinshe')}}" method="POST" role="form" enctype="multipart/form-data" style="margin-bottom: 16px">
            {{ csrf_field() }}
            <div class="form-group">
                <label>標題</label>
                <input name="title" class="form-control" placeholder="請輸入標題" required>
            </div>
            <div class="form-group">
                <label>關於新社</label>
                <textarea name="AboutXinshe" class="form-control" placeholder="請輸入關於新社"></textarea>
            </div>
            <div class="form-group">
                <label>上傳照片</label>
                <input type="file" class="form-control" name="img" value="{{old('img')}}" placeholder="上傳圖片" required>
            </div>
            <div class="text-left">
                <button type="submit" id="createButton" class="btn btn-success">新增</button>
            </div>
        </form>

        <form action="{{route('search.xinshe')}}" method="POST" class="card card-sm" style="margin-bottom: 16px;">
            {{ csrf_field() }}
            <div class="card-body row no-gutters align-items-center">
                <!--end of col-->
                <div class="col">
                    <input class="form-control form-control-lg form-control-borderless" name="search" type="search"
                           placeholder="搜尋標題" required>
                </div>
                <!--end of col-->
                <div class="col-auto">
                    <button class="btn btn-lg btn-success" type="submit">搜尋</button>
                </div>
                <!--end of col-->
            </div>
        </form>

        <table class="table" id="xinsheTable">
            <thead>
            <tr>
                <th scope="col">標題</th>
                <th scope="col" style="width: 60%">關於新社</th>
                <th scope="col">照片</th>
                <th scope="col">修改/刪除</th>
            </tr>
            </thead>
            <tbody>
            @foreach($XinsheList as $XinsheLists)
                <tr>
                    <td class="align-middle">{{$XinsheLists->title}}</td>
                    <td class="align-middle">{{$XinsheLists->AboutXinshe}}</td>
                    <td class="align-middle"><img src="{{url('../img/Xinshe/' . $XinsheLists->img)}}"
                                                  alt="Smiley face" height="100" width="100"></td>
                    <td class="align-middle">
                        <a href="{{route('show.xinshe.updateForm',$XinsheLists->id)}}" class="btn btn-success"
                           style="display: inline-block">修改</a>
                        <form class="delete" action="{{route('destroy.xinshe',$XinsheLists->id)}}" method="POST"
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
    </div>

    <script type="text/javascript">
        function ConfirmDelete() {
            var x = confirm("你確定要刪除此評分項目內容嗎?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
@endsection