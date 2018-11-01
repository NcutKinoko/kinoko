@extends('Backstage.layouts.master')

@section('title', 'HOME')

@section('content')
<div class="container-fluid">
    <h1 style="text-align: center">菜單</h1>
    <form action="{{route('store.menu')}}" method="POST" role="form" enctype="multipart/form-data" style="margin-bottom: 16px">
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
            <select class="form-control" name="product" required>
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
            <textarea name="remark" class="form-control" placeholder="請輸入備註"></textarea>
        </div>
        <div class="form-group">
            <label>上傳菜餚照片</label>
            <input type="file" class="form-control" name="img" value="{{old('img')}}" placeholder="上傳圖片" required>
        </div>
        <div class="text-left">
            <button type="submit" class="btn btn-success">新增</button>
        </div>
    </form>

    <form action="{{route('search.menu')}}" method="POST" class="card card-sm" style="margin-bottom: 16px;">
        {{ csrf_field() }}
        <div class="card-body row no-gutters align-items-center">
            <!--end of col-->
            <div class="col">
                <input class="form-control form-control-lg form-control-borderless" name="search" type="search"
                       placeholder="搜尋菜餚名稱" required>
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
        <tr style="text-align: center">
            <th style="width: 50%">菜餚資料</th>
            <th>步驟資料</th>
        </tr>
        </thead>
        @foreach($menuList as $menuLists)
        <tbody>
        <tr>
            <td>
                <div style="border-bottom: solid 1px;">
                    <h3 style="font-weight: bold;display: inline-block">料理名稱：</h3><h3 style="display: inline-block">{{$menuLists->menuName}}</h3>
                </div>
                <div style="border-bottom: solid 1px;">
                    <h3 style="font-weight: bold;display: inline-block">調味料：</h3><h3 style="display: inline-block">{{$menuLists->seasoning}}</h3>
                </div>
                <div style="border-bottom: solid 1px;">
                    <h3 style="font-weight: bold;display: inline-block">材料：</h3><h3 style="display: inline-block">{{$menuLists->material}}</h3>
                </div>
                <div style="border-bottom: solid 1px;">
                    <h3 style="font-weight: bold;display: inline-block">使用產品：</h3><h3 style="display: inline-block">{{$menuLists->productName}}</h3>
                </div>
                <div style="border-bottom: solid 1px;">
                    <h3 style="font-weight: bold;display: inline-block">醬汁：</h3><h3 style="display: inline-block">{{$menuLists->sauce}}</h3>
                </div>
                <div style="border-bottom: solid 1px;">
                    <h3 style="font-weight: bold;display: inline-block">備註：</h3><h3 style="display: inline-block">{{$menuLists->remark}}</h3>
                </div>
                <div style="border-bottom: solid 1px; padding: 5px 0 5px 0;">
                <h3 style="font-weight: bold;display: inline-block">照片：</h3><img src="{{url('../img/menu/' . $menuLists->img)}}" alt="Smiley face" height="100" width="100" style="display: inline-block">
                </div>
                <form action="{{route('store.step')}}" id="createStep{{$menuLists->id}}" method="POST"
                      role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>新增料理步驟</label>
                        <input id="stepContent{{$menuLists->id}}" name="step" class="form-control" placeholder="請輸入步驟" required>
                    </div>
                </form>
                <div class="text-left" style="display: inline-block">
                    <button data-content="{{$menuLists->id}}" class="createStepButton btn btn-success" id="createStepButton">新增步驟</button>
                </div>
                <div class="text-left" style="display: inline-block">
                    <a href="{{route('show.menu.updateForm',$menuLists->id)}}" class="btn btn-primary" style="display: inline-block">修改菜餚</a>
                </div>
                <form class="delete text-left" action="{{route('destroy.menu',$menuLists->id)}}" method="POST" onsubmit="return ConfirmDelete()" style="display: inline-block">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="submit" class="btn btn-danger" value="刪除菜餚">
                </form>
            </td>
            <td>
                <table style="border: 3px  #cccccc solid;" class="step" id="{{$menuLists->id}}">
                    <thead>
                    <tr>
                        <th scope="col" style="width: 59px;text-align: center;">編號</th>
                        <th scope="col">步驟</th>
                        <th scope="col" style="text-align: center">刪除</th>
                        <th scope="col" style="text-align: center">修改</th>
                    </tr>
                    </thead>
                    @foreach($stepList as $stepLists)
                        @if($stepLists->menu_id == $menuLists->id)
                            <tbody>
                            <tr id="tr{{$stepLists->id}}">
                                <td class="align-middle">
                                    <p>{{$stepLists->step}}</p>
                                    <input id="update{{$stepLists->id}}" name="step" class="form-control" placeholder="請輸入步驟"
                                           style="width: 100%" hidden="hidden" value="{{$stepLists->step}}">
                                </td>
                                <td class="align-middle">
                                    <button data-content="{{$stepLists->id}}" id="delete" class="delete btn btn-danger">x</button>
                                </td>
                                <td class="align-middle">
                                    <button data-content="{{$stepLists->id}}" id="update" class="update btn btn-success">修改</button>
                                    <button data-content="{{$stepLists->id}}" id="send" class="send btn btn-success" hidden="hidden">送出</button>
                                </td>
                            </tr>
                            </tbody>
                        @endif
                    @endforeach
                </table>
                <script>
                    var tables = document.getElementsByTagName('table');
                    var table = tables[tables.length - 1];
                    var rows = table.rows;
                    for (var i = 1, td; i < rows.length; i++) {
                        td = document.createElement('td');
                        td.setAttribute('class','align-middle');
                        td.setAttribute('style','text-align: center');
                        td.appendChild(document.createTextNode(i -1 + 1));
                        rows[i].insertBefore(td, rows[i].firstChild);
                    }
                </script>
            </td>
        </tr>
        </tbody>
        @endforeach
    </table>
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
            url: "{{route('destroy.step')}}",
            method: "POST",
            data: {
                id: id,
                _token: '{{csrf_token()}}'
            },
        });
        var TrId = $(this).attr('data-content');
        $('#tr' + TrId).remove();
        renumberRows()
    });

    //將菜單步驟做重新編號的方法
    function renumberRows() {
        var tables = document.getElementsByClassName('step');//頁面上所有table物件
        var count;
        [].forEach.call(tables, function (el) {//執行每一張table
            count = 0;
            for(var i = 1; i < el.rows.length; i++) {//執行每一列資料
                td = document.createElement('td');
                count += 1;//每一次都要對編號作累加
                td.appendChild(document.createTextNode(count));//將編號放入td內
                td.setAttribute('class','align-middle');
                td.setAttribute('style','text-align: center');
                el.rows[i].replaceChild(td, el.rows[i].firstElementChild);//用剛剛的td來取代掉原本資料列內的td
                console.log(el.rows[i].firstElementChild);
            }
        });
    }

    //新增菜單的方法的方法
    $(document).on("click", ".createStepButton", function (e) {
        e.preventDefault();//防止表單被提交出去導致頁面reload
        var id = $(this).attr('data-content');//抓取被點擊的button內屬性值為data-content的內容
        var stepContent = document.getElementById('stepContent' + id).value;//根據id抓取input的資料
        console.log(stepContent);//console.log()是用來輸出資料的程式語法，輸出的資料可以在chrome內對網頁按右鍵後在Console區域內做觀看，主要用來debug
        //使用ajax做資料新增
        $.ajax({
            //呼叫防呆方法
            beforeSend: function () {
                return checkAll(stepContent);
            },
            url: "{{route('store.step')}}",
            method: "POST",
            dataType: "json",
            data: {
                step: stepContent,
                id: id,
                _token: '{{csrf_token()}}'
            },
            //存入成功後執行的code
            success: function ($sen) {//$sen為controller的response回傳值
                console.log($sen);
                var table = document.getElementById($sen['menu_id']);//透過Table的ID取得Table物件
                console.log(table.rows.length);
                var lastRaws;
                var lastNumber;
                //抓取table內的編號
                if (table.rows.length == 1) {//如果等於1代表這個資料表內目前沒資料
                    lastNumber = 0;
                } else {
                    lastRaws = table.rows[table.rows.length - 1];//將資料表的最後一列放入lastRaws
                    lastNumber = lastRaws.firstChild.textContent;//將最後一列的第一個td放入lastNumber
                }
                var tr = document.createElement("tr");//createElement是用來建立html元件的語法
                tr.setAttribute("id", "tr" + $sen['id']);//setAttribute是用來設定html元件的屬性值的語法
                table.appendChild(tr);//appendChild是將指定物件加入另一個物件的語法
                var td = document.createElement("td");
                td.setAttribute('class','align-middle');
                td.setAttribute('style','text-align: center');
                tr.appendChild(td);
                td.innerHTML = parseInt(lastNumber) + 1;//將文字或數字加入到td內
                var td2 = document.createElement("td");
                var p = document.createElement("p");
                var contentInput = document.createElement("input");
                contentInput.setAttribute("style", "width: 100%;");
                contentInput.setAttribute("hidden", "hidden");//這邊相當於hidden = "hidden"
                contentInput.setAttribute("id", "update" + $sen['id']);
                contentInput.setAttribute("value", $sen['step']);
                contentInput.setAttribute("class","form-control");
                p.innerHTML = $sen['step'];
                tr.appendChild(td2);
                td2.appendChild(p);
                td2.appendChild(contentInput);
                var td3 = document.createElement("td");
                td3.setAttribute('style','text-align: center');
                td3.setAttribute('class','align-middle');
                var button = document.createElement("button");
                button.setAttribute("class", "delete btn btn-danger",);
                button.setAttribute("data-content", $sen['id']);
                button.textContent = "x";
                td3.appendChild(button);
                tr.appendChild(td3);
                var td4 = document.createElement("td");
                td4.setAttribute('style','text-align: center');
                td4.setAttribute('class','align-middle');
                var updateButton = document.createElement("button");
                var sendButton = document.createElement("button");
                updateButton.setAttribute("class", "update btn btn-success");
                updateButton.setAttribute("data-content", $sen['id']);
                updateButton.textContent = "修改";//將文字加入到物件的文字內容裡
                sendButton.setAttribute("class", "send btn btn-success");
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
        function checkAll(stepContent) {
            if (stepContent == "") {
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
            url: "{{route('update.step')}}",
            method: "POST",
            data: {
                id: id,
                content: updateContent,
                _token: '{{csrf_token()}}'
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
        var x = confirm("你確定要刪除此菜餚嗎?");
        if (x)
            return true;
        else
            return false;
    }
</script>
@endsection

