<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div>
    <form action="{{route('store.kinoko')}}" method="POST" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>評分項目</label>
            <input name="item" class="form-control" placeholder="請輸入評分項目" required>
        </div>
        <div class="form-group">
            <label>配分</label>
            <input name="distribution" id="distribution" class="form-control" placeholder="請輸入配分">
        </div>
        <div class="form-group">
            <label>測定方法</label>
            <input name="TestMethod" class="form-control" placeholder="請輸入測定方法" required>
        </div>
        <div class="text-left">
            <button type="submit" id="createButton" class="btn btn-success">新增</button>
        </div>
    </form>
</div>
<div>

    @foreach($KinokoList as $KinokoLists)
        <p>{{$KinokoLists->item}}</p>
        <p>{{$KinokoLists->distribution}}</p>
        <p>{{$KinokoLists->TestMethod}}</p>
        <a href="{{route('show.kinoko.updateForm',$KinokoLists->id)}}" class="btn btn-success">修改</a>
        <form class="delete" action="{{route('destroy.kinoko',$KinokoLists->id)}}" method="POST" onsubmit="return ConfirmDelete()">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="submit" class="btn btn-danger" value="刪除此評分項目">
        </form>

        <form action="{{route('store.step')}}" id="createStep{{$KinokoLists->id}}" method="POST"
              role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label>新增評分項目內容</label>
                <input id="kinokoContent{{$KinokoLists->id}}" name="kinoko" class="form-control" placeholder="請輸入步驟" required>
            </div>
            <div class="text-left">
                <button data-content="{{$KinokoLists->id}}" class="createKinokoButton" id="createKinokoButton">新增</button>
            </div>
        </form>

        <table style="border: 3px  #cccccc solid;" class="kinoko" id="{{$KinokoLists->id}}">
            @foreach($KinokoContent as $KinokoContents)
                @if($KinokoContents->KinokoStandard_id == $KinokoLists->id)
                    <tr id="tr{{$KinokoContents->id}}">
                        <td>
                            <p>{{$KinokoContents->content}}</p>
                            <input id="update{{$KinokoContents->id}}" name="kinoko" class="form-control" placeholder="請輸入評分說明"
                                   style="width: 100%" hidden="hidden" value="{{$KinokoContents->content}}">
                        </td>
                        <td>
                            <button data-content="{{$KinokoContents->id}}" id="delete" class="delete">x</button>
                        </td>
                        <td>
                            <button data-content="{{$KinokoContents->id}}" id="update" class="update">修改</button>
                            <button data-content="{{$KinokoContents->id}}" id="send" class="send" hidden="hidden">送出</button>
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
<script type="text/javascript">
    $.ajaxSetup({//我也不知道這段用來幹嘛的
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //刪除菜單步驟的方法
    $(document).on("click", ".delete", function () {
        var id = $(this).attr('data-content');
        $.ajax({
            url: "{{route('destroy.kinoko.RatingDescription')}}",
            method: "POST",
            data: {id: id},
        });
        var TrId = $(this).attr('data-content');
        $('#tr' + TrId).remove();
        renumberRows()
    });

    //將菜單步驟做重新編號的方法
    function renumberRows() {
        var tables = document.getElementsByTagName('table');//頁面上所有table物件
        var count;
        [].forEach.call(tables, function (el) {//執行每一張table
            count = 0;
            [].forEach.call(el.rows, function (ee) {//執行每一列資料
                td = document.createElement('td');
                count += 1;//每一次都要對編號作累加
                td.appendChild(document.createTextNode(count));//將編號放入td內
                ee.replaceChild(td, ee.firstElementChild);//用剛剛的td來取代掉原本資料列內的td
                console.log(ee.firstElementChild);
            });
        });
    }

    //新增菜單的方法的方法
    $(document).on("click", ".createKinokoButton", function (e) {
        e.preventDefault();//防止表單被提交出去導致頁面reload
        var id = $(this).attr('data-content');//抓取被點擊的button內屬性值為data-content的內容
        var kinokoContent = document.getElementById('kinokoContent' + id).value;//根據id抓取input的資料
        console.log(kinokoContent);//console.log()是用來輸出資料的程式語法，輸出的資料可以在chrome內對網頁按右鍵後在Console區域內做觀看，主要用來debug
        //使用ajax做資料新增
        $.ajax({
            //呼叫防呆方法
            beforeSend: function () {
                return checkAll(kinokoContent);
            },
            url: "{{route('store.kinoko.RatingDescription')}}",
            method: "POST",
            dataType: "json",
            data: {
                content: kinokoContent,
                id: id,
            },
            //存入成功後執行的code
            success: function ($sen) {//$sen為controller的response回傳值
                console.log($sen);
                var table = document.getElementById($sen['KinokoStandard_id']);//透過Table的ID取得Table物件
                console.log(table.rows.length);
                var lastRaws;
                var lastNumber;
                //抓取table內的編號
                if (table.rows.length == 0) {//如果等於0代表這個資料表內目前沒資料
                    lastNumber = 0;
                } else {
                    lastRaws = table.rows[table.rows.length - 1];//將資料表的最後一列放入lastRaws
                    lastNumber = lastRaws.firstChild.textContent;//將最後一列的第一個td放入lastNumber
                }
                var tr = document.createElement("tr");//createElement是用來建立html元件的語法
                tr.setAttribute("id", "tr" + $sen['id']);//setAttribute是用來設定html元件的屬性值的語法
                table.appendChild(tr);//appendChild是將指定物件加入另一個物件的語法
                var td = document.createElement("td");
                tr.appendChild(td);
                td.innerHTML = parseInt(lastNumber) + 1;//將文字或數字加入到td內
                var td2 = document.createElement("td");
                var p = document.createElement("p");
                var contentInput = document.createElement("input");
                contentInput.setAttribute("style", "width: 100%;");
                contentInput.setAttribute("hidden", "hidden");//這邊相當於hidden = "hidden"
                contentInput.setAttribute("id", "update" + $sen['id']);
                contentInput.setAttribute("value", $sen['content']);
                p.innerHTML = $sen['content'];
                tr.appendChild(td2);
                td2.appendChild(p);
                td2.appendChild(contentInput);
                var td3 = document.createElement("td");
                var button = document.createElement("button");
                button.setAttribute("class", "delete",);
                button.setAttribute("data-content", $sen['id']);
                button.textContent = "x";
                td3.appendChild(button);
                tr.appendChild(td3);
                var td4 = document.createElement("td");
                var updateButton = document.createElement("button");
                var sendButton = document.createElement("button");
                updateButton.setAttribute("class", "update");
                updateButton.setAttribute("data-content", $sen['id']);
                updateButton.textContent = "修改";//將文字加入到物件的文字內容裡
                sendButton.setAttribute("class", "send");
                sendButton.setAttribute("data-content", $sen['id']);
                sendButton.setAttribute("hidden", "hidden");
                sendButton.textContent = "送出";
                tr.appendChild(td4);
                td4.appendChild(updateButton);
                td4.appendChild(sendButton);
                console.log(table);
            }
        });
        //檢查input是否為空值
        function checkAll(kinokoContent) {
            if (kinokoContent == "") {
                alert("請輸入內容後在做新增");
                return false
            }
            else {
                return true
            }
        }
    });
    //準備修改菜單步驟的方法
    $(document).on("click", ".update", function () {
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
            url: "{{route('update.kinoko.RatingDescription')}}",
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

    function ConfirmDelete()
    {
        var x = confirm("你確定要刪除此評分項目內容嗎?");
        if (x)
            return true;
        else
            return false;
    }
    var createButton = document.getElementById('createButton');
    createButton.addEventListener('click', function (e) {
        var distribution = document.getElementById('distribution');
        if (isNaN(distribution.value)) {
            e.preventDefault();
            alert("配分必須為數字");
        }
    });
</script>
</body>