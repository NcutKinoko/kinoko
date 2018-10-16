@extends('Backstage.layouts.master')

@section('title', 'HOME')

@section('content')
<div class="container-fluid">
    <h1 style="text-align: center">活動名稱</h1>
    <form action="{{route('store.activity')}}" id="createActivity" method="POST" role="form"
          enctype="multipart/form-data" style="margin-bottom: 16px">
        {{ csrf_field() }}
        <div class="form-group">
            <label>活動名稱</label>
            <input id="name" name="name" class="form-control" placeholder="請輸入活動名稱" required>
        </div>
        <div class="text-left">
            <button type="submit" class="create btn btn-success" id="createButton">新增</button>
        </div>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">活動名稱</th>
            <th>刪除</th>
            <th>修改</th>
        </tr>
        </thead>
        <tbody>
        @foreach($activityList as $activityLists)
            <tr id="tr{{$activityLists->id}}">
                <td class="align-middle">
                    <p>{{$activityLists->name}}</p>
                    <input id="update{{$activityLists->id}}" name="name" class="form-control" placeholder="請輸入活動名稱"
                           style="width: 100%" hidden="hidden" value="{{$activityLists->name}}">
                </td>
                <td class="align-middle"><button data-content="{{$activityLists->id}}" id="delete" class="delete btn btn-danger">刪除</button></td>
                <td class="align-middle">
                    <button data-content="{{$activityLists->id}}" id="update" class="update btn btn-success">修改</button>
                    <button data-content="{{$activityLists->id}}" id="send" class="send btn btn-success" hidden="hidden">送出</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $.ajaxSetup({//如果要使用ajax這一段貌似是必要的
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //準備修改
    $(document).on("click", ".update", function () {
        console.log(true);
        var id = $(this).attr('data-content');
        var tr = document.getElementById('tr' + id);
        var deleteTd = tr.children[tr.children.length - 2];
        var deleteButton = deleteTd.children[deleteTd.children.length - 1];
        deleteButton.setAttribute("disabled", "");
        var updateTd = tr.children[tr.children.length - 1];
        var updateButton = updateTd.children[updateTd.children.length - 2];
        var sendButton = updateTd.children[updateTd.children.length - 1];
        updateButton.setAttribute("hidden", "hidden");
        sendButton.removeAttribute("hidden");
        var contentTd = tr.children[tr.children.length - 3];
        var contentP = contentTd.children[contentTd.children.length - 2];
        var contentInput = contentTd.children[contentTd.children.length - 1];
        contentP.setAttribute("hidden", "hidden");
        contentInput.removeAttribute("hidden");
    });
    //將修改後的資料做送出
    $(document).on("click", ".send", function () {
        var id = $(this).attr('data-content');
        var updateContent = document.getElementById('update' + id).value;
        console.log(updateContent);
        $.ajax({
            beforeSend: function () {
                return checkAll(updateContent);
            },
            url: "{{route('update.activity')}}",
            method: "POST",
            data: {
                id: id,
                content: updateContent,
            },
            success: function ($request) {
                console.log($request);
                var tr = document.getElementById('tr' + $request['id']);
                var contentTd = tr.children[tr.children.length - 3];
                var contentP = contentTd.children[contentTd.children.length - 2];
                var contentInput = contentTd.children[contentTd.children.length - 1];
                contentP.removeAttribute("hidden");
                contentP.innerHTML = $request['content'];
                contentInput.setAttribute("hidden", "hidden");
                var deleteTd = tr.children[tr.children.length - 2];
                var deleteButton = deleteTd.children[deleteTd.children.length - 1];
                deleteButton.removeAttribute("disabled");
                var updateTd = tr.children[tr.children.length - 1];
                var updateButton = updateTd.children[updateTd.children.length - 2];
                var sendButton = updateTd.children[updateTd.children.length - 1];
                updateButton.removeAttribute("hidden");
                sendButton.setAttribute("hidden", "hidden");
            }
        });
        function checkAll(updateContent) {
            if (updateContent == "") {
                alert("請輸入內容後在做修改");
                return false
            }
            else {
                return true
            }
        }
    });

    //刪除活動
    $(document).on("click", ".delete", function () {
        var id = $(this).attr('data-content');
        $.ajax({
            beforeSend: function () {
                return ConfirmDelete();
            },
            url: "{{route('destroy.activity')}}",
            method: "POST",
            data: {id: id},
            success: function ($sen) {
                var TrId = $sen['id'];
                console.log(TrId);
                $('#tr' + TrId).remove();
            }
        });
        function ConfirmDelete()
        {
            var x = confirm("你確定要刪除此產品類別嗎?");
            if (x)
                return true;
            else
                return false;
        }
    });
</script>
@endsection