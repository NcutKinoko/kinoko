<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div>
    <form action="{{route('store.category')}}" id="createCategory" method="POST" role="form"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>產品類別名稱</label>
            <input id="categoryName" name="name" class="form-control" placeholder="請輸入產品類別名稱">
        </div>
        <div class="text-left">
            <button type="submit" class="create" id="createButton">新增</button>
        </div>
    </form>
    <table id="categoryTable">
        @foreach($categoryList as $categoryLists)
            <tr id="tr{{$categoryLists->id}}">
                <td>{{$categoryLists->name}}</td>
                <td>
                    <button data-content="{{$categoryLists->id}}" id="delete" class="delete">x</button>
                </td>
            </tr>
        @endforeach
    </table>
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
                tr.appendChild(td);
                td.innerHTML = $sen['result'];
                var td2 = document.createElement("td");
                tr.appendChild(td2);
                var button = document.createElement("button");
                button.setAttribute("class", "delete",);
                button.setAttribute("data-content", $sen['id']);
                button.textContent = "x";
                td2.appendChild(button);
                console.log(table);
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
            url: "{{route('destroy.category')}}",
            method: "POST",
            data: {id: id},
        });
        var TrId = $(this).attr('data-content');
        console.log(TrId);
        $('#tr' + TrId).remove();
    });
</script>