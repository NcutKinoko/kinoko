@extends('Backstage.layouts.master')

@section('title', 'HOME')

@section('content')
    <div class="container-fluid">
        <h1 style="text-align: center">活動圖片</h1>
        <form action="{{route('store.activity_record')}}" id="createActivityRecord" method="POST" role="form"
              enctype="multipart/form-data" style="margin-bottom: 16px">
            {{ csrf_field() }}
            <div class="form-group">
                <label>標題</label>
                <input id="name" name="name" class="form-control" placeholder="請輸入標題" required>
            </div>
            <div class="form-group">
                <label>所屬副標題</label>
                <select name="subtitle_id" class="form-control" required>
                    <option value="" disabled="disabled" selected="selected">請選擇副標題</option>
                    @foreach($subtitleList as $subtitleLists)
                        <option value={{$subtitleLists->id}}>{{$subtitleLists->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>圖片</label>
                <input type="file" id="img" name="img" class="form-control" placeholder="請輸選擇圖片" required>
            </div>
            <div class="text-left">
                <button type="submit" class="create btn btn-success" id="createButton">新增</button>
            </div>
        </form>

        <form action="{{route('search.activity_record')}}" method="POST" class="card card-sm" style="margin-bottom: 16px;">
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

        <table class="table">
            <thead>
            <tr>
                <th scope="col">標題</th>
                <th scope="col">所屬副標題</th>
                <th scope="col">圖片</th>
                <th scope="col">修改/刪除</th>
            </tr>
            </thead>
            <tbody>
            @foreach($activity_record as $activity_records)
                <tr>
                    <td class="align-middle">{{$activity_records->activity_recordName}}</td>
                    <td class="align-middle">{{$activity_records->subtitleName}}</td>
                    <td class="align-middle"><img src="{{url('../img/activity_record/' . $activity_records->img)}}" alt="Smiley face" height="100" width="100"></td>
                    <td class="align-middle">
                        <a href="{{route('show.activity_record.updateForm',$activity_records->id)}}" class="btn btn-success" style="display: inline-block">修改</a>
                        <form class="delete" action="{{route('destroy.activity_record',$activity_records->id)}}" method="POST" onsubmit="return ConfirmDelete()" style="display: inline-block; margin: 0;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="submit" class="btn btn-danger" value="刪除">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        function ConfirmDelete()
        {
            var x = confirm("你確定要刪除此活動圖片嗎?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
@endsection