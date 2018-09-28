<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div>
    <form action="{{route('store.xinshe')}}" method="POST" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>標題</label>
            <input name="title" class="form-control" placeholder="請輸入標題" required>
        </div>
        <div class="form-group">
            <label>關於新社</label>
            <textarea name="AboutXinshe" class="form-control" placeholder="請輸入關於新社"></textarea>
        </div>
        <div class="form-group">
            <label>上傳菇農照片</label>
            <input type="file" class="form-control" name="img" value="{{old('img')}}" placeholder="上傳圖片" required>
        </div>
        <div class="text-left">
            <button type="submit" id="createButton" class="btn btn-success">新增</button>
        </div>
    </form>
</div>
<div>

    @foreach($XinsheList as $XinsheLists)
        <label>姓名:</label><p>{{$XinsheLists->AboutXinshe}}</p>
        <img src="{{url('../img/Xinshe/' . $XinsheLists->img)}}" alt="Smiley face" height="100" width="100">
        <a href="{{route('show.xinshe.updateForm',$XinsheLists->id)}}" class="btn btn-success">修改</a>
        <form class="delete" action="{{route('destroy.xinshe',$XinsheLists->id)}}" method="POST"
              onsubmit="return ConfirmDelete()">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="submit" class="btn btn-danger" value="刪除此評分項目">
        </form>
    @endforeach
</div>
<script type="text/javascript">
    function ConfirmDelete() {
        var x = confirm("你確定要刪除此評分項目內容嗎?");
        if (x)
            return true;
        else
            return false;
    }
</script>
</body>