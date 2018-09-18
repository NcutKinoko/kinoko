<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div>
    <form action="{{route('store.menu')}}" method="POST" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>料理名稱</label>
            <input name="name" class="form-control" placeholder="請輸入料理名稱" required>
        </div>
        <div class="form-group">
            <label>調味料</label>
            <input name="seasoning" class="form-control" placeholder="請輸入調味料名稱">
        </div>
        <div class="form-group">
            <label>材料</label>
            <input name="material" class="form-control" placeholder="請輸入材料名稱" required>
        </div>
        <div class="form-group">
            <label>使用產品</label>
            <select name="product" required>
                <option value="" disabled="disabled" selected="selected">請選擇使用產品</option>
                @foreach($productList as $productLists)
                    <option value={{$productLists->id}}>{{$productLists->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>醬汁</label>
            <input name="sauce" class="form-control" placeholder="請輸入醬汁名稱" required>
        </div>
        <div class="form-group">
            <label>備註</label>
            <textarea name="remark" class="form-control" placeholder="請輸入備註" required></textarea>
        </div>
        <div class="form-group">
            <label>上傳菜餚照片</label>
            <input type="file" class="form-control" name="img" value="{{old('img')}}" placeholder="上傳圖片" required>
        </div>
        <div class="text-left">
            <button type="submit" class="btn btn-success">新增</button>
        </div>
    </form>
</div>
<div>

    @foreach($menuList as $menuLists)
        <p>{{$menuLists->name}}</p>
        <img src="{{url('../img/menu/' . $menuLists->img)}}" alt="Smiley face" height="100" width="100">

        <form action="{{route('store.step')}}" id="createStep{{$menuLists->id}}" method="POST"
              role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label>新增料理步驟</label>
                <input id="stepContent{{$menuLists->id}}" name="step" class="form-control" placeholder="請輸入步驟" required>
            </div>
            <div class="text-left">
                <button data-content="{{$menuLists->id}}" class="createStepButton" id="createStepButton">新增</button>
            </div>
        </form>

        <table style="border: 3px  #cccccc solid;" class="step" id="{{$menuLists->id}}">
            @foreach($stepList as $stepLists)
                @if($stepLists->menu_id == $menuLists->id)
                    <tr id="tr{{$stepLists->id}}">
                        <td>{{$stepLists->step}}</td>
                        <td>
                            <button data-content="{{$stepLists->id}}" id="delete" class="delete">x</button>
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
        <script>
            var tables = document.getElementsByTagName('table');
            var table = tables[tables.length - 1];
            var rows = table.rows;
            for (var i = 0, td; i < rows.length; i++) {
                td = document.createElement('td');
                td.appendChild(document.createTextNode(i + 1));
                rows[i].insertBefore(td, rows[i].firstChild);
            }
        </script>
    @endforeach
</div>
<p id="demo"></p>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //刪除菜單步驟的方法
    $(document).on("click", ".delete", function () {
        var id = $(this).attr('data-content');
        $.ajax({
            url: "{{route('destroy.step')}}",
            method: "POST",
            data: {id: id},
        });
        var TrId = $(this).attr('data-content');
        $('#tr' + TrId).remove();
        renumberRows()
    });

    //將菜單步驟做重新編號的方法
    function renumberRows() {
        var tables = document.getElementsByTagName('table');
        var count;
        [].forEach.call(tables, function (el) {
            count = 0;
            [].forEach.call(el.rows, function (ee) {
                td = document.createElement('td');
                count += 1;
                td.appendChild(document.createTextNode(count));
                ee.replaceChild(td, ee.firstElementChild);
                console.log(ee.firstElementChild);
            });
        });
    }

    //新增菜單的方法
    $(document).on("click", ".createStepButton", function (e) {
        //防止表單被提交出去導致頁面reload
        e.preventDefault();
        //使用ajax方法將資料存進資料庫
        var id = $(this).attr('data-content');
        var stepContent = document.getElementById('stepContent' + id).value;
        console.log(stepContent);
        $.ajax({
            // beforeSend: function (XMLHttpRequest) {
            //     return (checkAll());
            // },
            url: "{{route('store.step')}}",
            method: "POST",
            dataType: "json",
            data: {
                step: stepContent,
                id: id,
            },
            //存入成功後執行的code
            success: function ($sen) {//$sen為controller的response回傳值
                console.log($sen);
                var table = document.getElementById($sen['menu_id']);
                console.log(table.rows.length);
                var lastRaws ;
                var lastNumber;
                if (table.rows.length == 0) {
                    lastNumber = 0;
                }else{
                    lastRaws = table.rows[table.rows.length - 1];
                    lastNumber = lastRaws.firstChild.textContent;
                }
                var tr = document.createElement("tr");
                tr.setAttribute("id", "tr" + $sen['id']);
                table.appendChild(tr);
                var td = document.createElement("td");
                tr.appendChild(td);
                td.innerHTML = parseInt(lastNumber) + 1;
                var td2 = document.createElement("td");
                tr.appendChild(td2);
                td2.innerHTML = $sen['step'];
                var td3 = document.createElement("td");
                var button = document.createElement("button");
                button.setAttribute("class", "delete",);
                button.setAttribute("data-content", $sen['id']);
                button.textContent = "x";
                td3.appendChild(button);
                tr.appendChild(td3);
                console.log(table);
            }
        });
    });
</script>
</body>

