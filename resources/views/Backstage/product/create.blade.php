<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<div class="container-fluid">
<div>
    <form action="{{route('store.product')}}" method="POST" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group" style="width: 50%">
            <label>產品名稱</label>
            <input name="name" class="form-control" placeholder="請輸入產品名稱" required>
        </div>
        <div class="form-group" style="width: 50%">
            <label>產品類別</label>
            <select name="category" class="form-control" required>
                <option value="" disabled="disabled" selected="selected">請選擇產品類別</option>
                @foreach($CategoryList as $CategoryLists)
                    <option value={{$CategoryLists->id}}>{{$CategoryLists->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group" style="width: 50%">
            <label>單價</label>
            <input id="price" name="price" class="form-control" placeholder="請輸入單價" required>
        </div>
        <div class="form-group" style="width: 50%">
            <label>庫存量</label>
            <input id="inventory" name="inventory" class="form-control" placeholder="請輸入庫存量" required>
        </div>
        <div class="form-group" style="width: 50%">
            <label>大小</label>
            <input name="size" class="form-control" placeholder="請輸入大小" required>
        </div>
        <div class="form-group" style="width: 50%">
            <label>介紹</label>
            <textarea name="introduction" class="form-control" placeholder="請輸入介紹" style="width: 50%"></textarea>
        </div>
        <div class="form-group" style="width: 50%">
            <label>上傳產品照片</label>
            <input type="file" class="form-control" name="img" value="{{old('img')}}" placeholder="上傳圖片" required>
        </div>
        <div class="text-left">
            <button type="submit" class="btn btn-success" id="createButton">新增</button>
        </div>
    </form>
</div>
    <div>
        @foreach($product as $products)
            <p>{{$products->name}}</p>
            <img src="{{url('../img/product/' . $products->img)}}" alt="Smiley face" height="100" width="100">
            <a href="{{route('show.product.updateForm',$products->id)}}" class="btn btn-success">修改</a>
            <form class="delete" action="{{route('destroy.product',$products->id)}}" method="POST" onsubmit="return ConfirmDelete()">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="submit" class="btn btn-danger" value="刪除此產品">
            </form>
        @endforeach
    </div>
    <script>
        var createButton = document.getElementById('createButton');
        createButton.addEventListener('click', function (e) {
            var price = document.getElementById('price');
            var inventory = document.getElementById('inventory');
            if (isNaN(price.value)) {
                e.preventDefault();
                alert("價格必須為數字");
            }
            if (isNaN(inventory.value)) {
                e.preventDefault();
                alert("庫存量必須為數字");
            }
        });
        function ConfirmDelete()
        {
            var x = confirm("你確定要刪除此產品嗎?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
</div>