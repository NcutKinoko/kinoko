<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<div class="container-fluid">
    <h1 style="text-align: center">產品修改</h1>
    @foreach($updateProduct as $updateProducts)
        <form action="{{route('update.product',$updateProducts->id)}}" method="POST" role="form"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label>產品名稱</label>
                <input name="name" class="form-control" placeholder="請輸入產品名稱" value="{{$updateProducts->name}}"
                       required>
            </div>
            <div class="form-group">
                <label>產品類別</label>
                <select class="form-control" name="category" required>
                    @if($updateProducts->category_id == 0)
                        <option value="0" selected="selected">此產品未分類</option>
                    @endif
                    @foreach($categoryList as $CategoryLists)
                        @if($CategoryLists->id == $updateProducts->category_id)
                            <option value="{{$CategoryLists->id}}" selected="selected">{{$CategoryLists->name}}</option>
                        @else
                            <option value="{{$CategoryLists->id}}">{{$CategoryLists->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>單價</label>
                <input id="price" name="price" class="form-control" placeholder="請輸入單價"
                       value="{{$updateProducts->price}}" required>
            </div>
            <div class="form-group">
                <label>庫存量</label>
                <input id="inventory" name="inventory" class="form-control" placeholder="請輸入庫存量"
                       value="{{$updateProducts->inventory}}" required>
            </div>
            <div class="form-group">
                <label>大小</label>
                <input name="size" class="form-control" placeholder="請輸入大小" value="{{$updateProducts->size}}" required>
            </div>
            <div class="form-group">
                <label>介紹</label>
                <textarea name="introduction" class="form-control" placeholder="請輸入介紹" style="width: 50%">{{$updateProducts->introduction}}</textarea>
            </div>
            <div class="form-group">
                <label>上傳產品照片</label>
                <input type="file" class="form-control" name="img" value="{{$updateProducts->img}}" placeholder="上傳圖片"
                       required>
            </div>
            <div class="text-left">
                <button type="submit" class="btn btn-success" id="updateButton">修改</button>
            </div>
        </form>
    @endforeach
    <script>
        var createButton = document.getElementById('updateButton');
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
    </script>
</div>