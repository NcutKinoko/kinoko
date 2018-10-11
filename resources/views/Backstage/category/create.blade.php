<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container-fluid">
    <form action="{{route('store.category')}}" id="createCategory" method="POST" role="form"
          enctype="multipart/form-data">
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
        </tr>
        </thead>
        <tbody>
        @foreach($categoryList as $categoryLists)
            <tr id="tr{{$categoryLists->id}}">
                <td class="align-middle">{{$categoryLists->name}}</td>
                <td class="align-middle"><button data-content="{{$categoryLists->id}}" id="delete" class="delete btn btn-danger">x</button></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{--<table id="categoryTable">--}}
        {{--@foreach($categoryList as $categoryLists)--}}
            {{--<tr id="tr{{$categoryLists->id}}">--}}
                {{--<td>{{$categoryLists->name}}</td>--}}
                {{--<td>--}}
                    {{--<button data-content="{{$categoryLists->id}}" id="delete" class="delete">x</button>--}}
                {{--</td>--}}
            {{--</tr>--}}
        {{--@endforeach--}}
    {{--</table>--}}
</div>
</body>
<script type="text/javascript">
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
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
                td.innerHTML = $sen['result'];
                var td2 = document.createElement("td");
                td2.setAttribute('class','align-middle');
                tr.appendChild(td2);
                var button = document.createElement("button");
                button.setAttribute("class", "delete btn btn-danger",);
                button.setAttribute("data-content", $sen['id']);
                button.textContent = "x";
                td2.appendChild(button);
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
    $(document).on("click", ".delete", function () {
        var id = $(this).attr('data-content');
        $.ajax({
            beforeSend: function () {
                return ConfirmDelete();
            },
            url: "{{route('destroy.category')}}",
            method: "POST",
            data: {id: id},
            success: function () {
                $('#categoryTable').load(document.URL + ' #categoryTable');
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