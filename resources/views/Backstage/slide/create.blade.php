@extends('Backstage.layouts.master')

@section('title', 'HOME')

@section('content')
    <div class="container-fluid">
        <h1 style="text-align: center">新增主頁幻燈片</h1>
        <form action="{{route('store.slide')}}" method="POST" role="form" enctype="multipart/form-data" style="margin-bottom: 16px">
            {{ csrf_field() }}
            <div class="form-group">
                <label>上傳幻燈片圖</label>
                <input type="file" class="form-control" name="img" value="{{old('img')}}" placeholder="上傳圖片" required>
            </div>
            <div class="form-group">
                <label>圖片網址</label>
                <input class="form-control" name="url" placeholder="請輸入圖片鏈結">
            </div>
            <div class="text-left">
                    <button type="submit" class="btn btn-success" id="createButton">新增</button>
            </div>
        </form>
        <table class="table">
            <thead>
            <tr>
                <th>圖片</th>
                <th>圖片網址</th>
                <th>修改/刪除</th>
            </tr>
            </thead>
            <tbody>
            @foreach($slideList as $slideLists)
                <tr>
                    <td class="align-middle">
                        <img src="{{url('../img/slide/' . $slideLists->img)}}" alt="Smiley face" style="width: 100px;height: 100px;">
                    </td>
                    <td class="align-middle">
                        {{$slideLists->url}}
                    </td>
                    <td class="align-middle">
                        <a href="{{route('show.slide.updateForm',$slideLists->id)}}" class="btn btn-success" style="display: inline-block">修改</a>
                        <form class="delete" action="{{route('destroy.slide',$slideLists->id)}}" method="POST"
                              onsubmit="return ConfirmDelete()" style="display: inline-block">
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
            function ConfirmDelete() {
                var x = confirm("你確定要刪除此幻燈片圖嗎?");
                if (x)
                    return true;
                else
                    return false;
            }
        </script>
    </div>
@endsection