@extends('Backstage.layouts.master')

@section('title', 'HOME')

@section('content')
    <div class="container-fluid">
        <form action="{{route('store.category')}}" id="createCategory" method="POST" role="form"
              enctype="multipart/form-data" style="margin-bottom: 16px;">
            {{ csrf_field() }}
            <div class="form-group">
                <label>產品類別名稱</label>
                <input id="categoryName" name="name" class="form-control" placeholder="請輸入產品類別名稱">
            </div>
            <div class="text-left">
                <button type="submit" class="create btn btn-success" id="createButton">新增</button>
            </div>
        </form>
        <table class="table" id="categoryTable">
            <thead>
            <tr>
                <th scope="col">產品類別</th>
                <th scope="col">刪除</th>
                <th scope="col">修改</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categoryList as $categoryLists)
                <tr id="tr{{$categoryLists->id}}">
                    <td class="align-middle">
                        <p>{{$categoryLists->name}}</p>
                        <input id="update{{$categoryLists->id}}" name="name" class="form-control" placeholder="請輸入產品類別"
                               style="width: 100%" hidden="hidden" value="{{$categoryLists->name}}">
                    </td>
                    <td class="align-middle"><button data-content="{{$categoryLists->id}}" id="delete" class="delete btn btn-danger">刪除</button></td>
                    <td class="align-middle">
                        <button data-content="{{$categoryLists->id}}" id="update" class="update btn btn-success">修改</button>
                        <button data-content="{{$categoryLists->id}}" id="send" class="send btn btn-success" hidden="hidden">送出</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
<script type="text/javascript">
    var createButton = document.getElementById('createButton');
    createButton.addEventListener('click', function (e) {
        e.preventDefault();
        $.ajax({
            beforeSend: function () {
                var categoryName = document.getElementById('categoryName');
                var NameContent = categoryName.value;
                return checkAll(NameContent);
            },
            url: "{{route('store.category')}}",
            method: "POST",
            dataType: "json",
            data: $("#createCategory").serialize(),
            success: function ($sen) {
                var table = document.getElementById('categoryTable');
                var tr = document.createElement("tr");
                tr.setAttribute("id", "tr" + $sen['id']);
                table.appendChild(tr);
                var td = document.createElement("td");
                td.setAttribute('class','align-middle');
                tr.appendChild(td);
                var contentP = document.createElement("p");
                var contentInput = document.createElement("input");
                contentInput.setAttribute("id","update" + $sen['id']);
                contentInput.setAttribute("placeholder","請輸入產品類別");
                contentInput.setAttribute("style","width: 100%");
                contentInput.setAttribute("hidden","hidden");
                contentInput.setAttribute("class","form-control");
                contentInput.setAttribute("value",$sen['result']);
                contentP.innerHTML = $sen['result'];
                td.appendChild(contentP);
                td.appendChild(contentInput);
                var td2 = document.createElement("td");
                td2.setAttribute('class','align-middle');
                tr.appendChild(td2);
                var button = document.createElement("button");
                button.setAttribute("class", "delete btn btn-danger",);
                button.setAttribute("data-content", $sen['id']);
                button.textContent = "刪除";
                td2.appendChild(button);
                var td3 = document.createElement("td");
                td3.setAttribute("class","align-middle");
                tr.appendChild(td3);
                var updateButton = document.createElement("button");
                var sendButton = document.createElement("button");
                updateButton.setAttribute("data-content",$sen['id']);
                updateButton.setAttribute("id","update");
                updateButton.setAttribute("class","update btn btn-success");
                updateButton.textContent = "修改";
                sendButton.setAttribute("data-content",$sen['id']);
                sendButton.setAttribute("id","send");
                sendButton.setAttribute("class","send btn btn-success");
                sendButton.setAttribute("hidden","hidden");
                sendButton.textContent = "發送";
                td3.appendChild(updateButton);
                td3.appendChild(sendButton);
            }
        });
        function checkAll(NameContent) {
            if (NameContent == "") {
                alert("請輸入內容後在做新增");
                return false
            }
            else {
                return true
            }
        }
    });
    $.ajaxSetup({
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
            url: "{{route('update.category')}}",
            method: "POST",
            data: {
                id: id,
                content: updateContent,
            },
            success: function ($request) {
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

    $(document).on("click", ".delete", function () {
        var id = $(this).attr('data-content');
        $.ajax({
            beforeSend: function () {
                return ConfirmDelete();
            },
            url: "{{route('destroy.category')}}",
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
