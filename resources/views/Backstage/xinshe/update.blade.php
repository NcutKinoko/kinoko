<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div>
    @foreach($updateXinshe as $updateXinshes)
    <form action="{{route('update.xinshe',$updateXinshes->id)}}" method="POST" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>標題</label>
            <input name="title" class="form-control" placeholder="請輸入標題" value="{{$updateXinshes->title}}" required>
        </div>
        <div class="form-group">
            <label>關於新社</label>
            <textarea name="AboutXinshe" class="form-control" placeholder="請輸入關於新社">{{$updateXinshes->AboutXinshe}}</textarea>
        </div>
        <div class="form-group">
            <label>上傳菇農照片</label>
            <input type="file" class="form-control" name="img" value="{{old('img')}}" placeholder="上傳圖片" required>
        </div>
        <div class="text-left">
            <button type="submit" id="createButton" class="btn btn-success">修改</button>
        </div>
    </form>
        @endforeach
</div>
</body>