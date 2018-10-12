<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container-fluid">
    <h1 style="text-align: center">菜單</h1>
    @foreach($updateMenu as $updateMenus)
    <form action="{{route('update.menu',$updateMenus->id)}}" method="POST" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>料理名稱</label>
            <input name="name" class="form-control" placeholder="請輸入料理名稱" value="{{$updateMenus->name}}" required>
        </div>
        <div class="form-group">
            <label>調味料</label>
            <input name="seasoning" class="form-control" placeholder="請輸入調味料名稱" value="{{$updateMenus->seasoning}}">
        </div>
        <div class="form-group">
            <label>材料</label>
            <input name="material" class="form-control" placeholder="請輸入材料名稱" value="{{$updateMenus->material}}" required>
        </div>
        <div class="form-group">
            <label>使用產品</label>
            <select class="form-control" name="product" required>
                @if($updateMenus->product_id == 0)
                    <option value="0" selected="selected">此菜餚未使用產品</option>
                @endif
                @foreach($categoryList as $categoryLists)
                    @if($categoryLists->id = $updateMenus->product_id)
                        <option value="{{$categoryLists->id}}" selected="selected">{{$categoryLists->name}}</option>
                    @else
                        <option value="{{$categoryLists->id}}">{{$categoryLists->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>醬汁</label>
            <input name="sauce" class="form-control" placeholder="請輸入醬汁名稱" value="{{$updateMenus->sauce}}" required>
        </div>
        <div class="form-group">
            <label>備註</label>
            <textarea name="remark" class="form-control" placeholder="請輸入備註">{{$updateMenus->remark}}</textarea>
        </div>
        <div class="form-group">
            <label>上傳菜餚照片</label>
            <input type="file" class="form-control" name="img" placeholder="上傳圖片" required>
        </div>
        <div class="text-left">
            <button type="submit" class="btn btn-success">修改</button>
        </div>
    </form>
        @endforeach
</div>