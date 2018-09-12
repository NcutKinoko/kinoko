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

        <form action="{{route('store.step',$menuLists->id)}}" method="POST" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label>新增料理步驟</label>
                <input name="step" class="form-control" placeholder="請輸入步驟" required>
            </div>
            <div class="text-left">
                <button type="submit" class="btn btn-success">新增</button>
            </div>
        </form>

        <table>
            @foreach($stepList as $stepLists)
                @if($stepLists->menu_id == $menuLists->id)
                    <tr>
                        <td>{{$stepLists->step}}</td>
                        <td>
                            <button data-id="{{ $stepLists->id }}" data-token="{{ csrf_token() }}" class="Delete">x</button>
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
<button class="gg" id="gg">新增文字</button>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        $(".Delete").click(function () {
            var id = $(this).data("id");
            var url = "step/destroy/" + id;// the script where you handle the form input.
            document.getElementById("demo").innerHTML = id;
            $.ajax({
                type: "delete",
                url: url,
                dataType:JSON,
                data: {
                    'id': id
                },// serializes the form's elements.
                success: function (data) {
                    alert(data);// show response from the php script.
                }
            });
        });
    });

</script>
</body>

