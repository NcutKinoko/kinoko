@extends('Backstage.layouts.master')

@section('title', 'HOME')

@section('content')
<div class="container-fluid">
    <form action="{{route('store.subtitle')}}" id="createSubtitle" method="POST" role="form"
          enctype="multipart/form-data" style="margin-bottom: 16px">
        {{ csrf_field() }}
        <div class="form-group">
            <label>副標題</label>
            <input id="name" name="name" class="form-control" placeholder="請輸入副標題" required>
        </div>
        <div class="form-group">
            <label>所屬活動</label>
            <select name="activity_id" class="form-control" required>
                <option value="" disabled="disabled" selected="selected">請選擇活動</option>
                @foreach($activityList as $activityLists)
                    <option value={{$activityLists->id}}>{{$activityLists->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="text-left">
            <button type="submit" class="create btn btn-success" id="createButton">新增</button>
        </div>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">編號</th>
            <th scope="col">副標題</th>
            <th scope="col">所屬活動</th>
            <th scope="col">修改/刪除</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subtitleList as $subtitleLists)
            <tr>
                <th class="align-middle" scope="row">{{$subtitleLists->id}}</th>
                <td class="align-middle">{{$subtitleLists->subtitleName}}</td>
                <td class="align-middle">{{$subtitleLists->activityName}}</td>
                <td class="align-middle">
                    <a href="{{route('show.subtitle.updateForm',$subtitleLists->id)}}" class="btn btn-success" style="display: inline-block">修改</a>
                    <form class="delete" action="{{route('destroy.subtitle',$subtitleLists->id)}}" method="POST" onsubmit="return ConfirmDelete()" style="display: inline-block; margin: 0;">
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
        var x = confirm("你確定要刪除此副標嗎?");
        if (x)
            return true;
        else
            return false;
    }
</script>
@endsection