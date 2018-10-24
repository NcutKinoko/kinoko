@extends('Backstage.layouts.master')

@section('title', 'HOME')

@section('content')
    <div class="container-fluid">
        <h1 style="text-align: center">會員管理</h1>
        <table class="table" id="productTable">
            <thead>
            <tr>
                <th scope="col">帳號</th>
                <th scope="col">姓名</th>
                <th scope="col">email</th>
                <th scope="col">帳戶權限</th>
                <th scope="col">修改帳戶權限</th>
                <th scope="col">使用權</th>
                <th scope="col">使用權/刪除</th>
            </tr>
            </thead>
            <tbody>
            @foreach($AuthList as $AuthLists)
                <tr>
                    <td class="align-middle">{{$AuthLists->account}}</td>
                    <td class="align-middle">{{$AuthLists->UserName}}</td>
                    <td class="align-middle">{{$AuthLists->email}}</td>
                    <td class="align-middle">{{$AuthLists->LevelName}}</td>
                    <td class="align-middle">
                        <form action="{{route('update.BackstageAuth',$AuthLists->id)}}" method="POST" role="form"
                              enctype="multipart/form-data" onsubmit="return ConfirmIsCancel()">
                            {{ csrf_field() }}
                            <div class="form-group" style="display: inline-block; margin:0;">
                                <select class="form-control" name="level" required>
                                    @foreach($LevelList as $LevelLists)
                                        @if($LevelLists->id == $AuthLists->level_id)
                                            <option value="{{$LevelLists->id}}"
                                                    selected="selected">{{$LevelLists->name}}</option>
                                        @else
                                            <option value="{{$LevelLists->id}}">{{$LevelLists->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="text-left" style="display: inline-block">
                                <button type="submit" class="btn btn-success" id="levelButton">修改帳戶權限</button>
                            </div>
                        </form>
                    </td>
                    <td class="align-middle">{{$AuthLists->IsCancel}}</td>
                    <td class="align-middle">
                        @if($AuthLists->IsCancel == "已開啟")
                            <a href="{{route('close.BackstageAuth',$AuthLists->id)}}" class="btn btn-primary"
                               style="display: inline-block" onclick="return ConfirmClose()">關閉</a>
                        @elseif($AuthLists->IsCancel == "未開啟")
                            <a href="{{route('open.BackstageAuth',$AuthLists->id)}}" class="btn btn-primary"
                               style="display: inline-block" onclick="return ConfirmOpen()">開啟</a>
                        @endif
                        <form class="delete" action="{{route('destroy.BackstageAuth',$AuthLists->id)}}" method="POST"
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
            var x = confirm("你確定要刪除此會員嗎?");
            if (x)
                return true;
            else
                return false;
        }
        function ConfirmIsCancel() {
            var x = confirm("你確定要變更此會員權限嗎?");
            if (x)
                return true;
            else
                return false;
        }
        function ConfirmOpen() {
            var x = confirm("你確定要開起此會員使用權嗎?");
            if (x)
                return true;
            else
                return false;
        }
        function ConfirmClose() {
            var x = confirm("你確定要關閉此會員使用權嗎?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
@endsection