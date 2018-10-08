<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<div>
    @foreach($updateProductionProcess as $updateProductionProcessNew)
    <form action="{{route('update.process', $updateProductionProcessNew->id)}}" method="POST" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group" style="width: 50%">
            <label>上傳產品照片</label>
            <input type="file" class="form-control" name="img" value="{{old('img')}}" placeholder="上傳圖片" required>
        </div>
        <div class="text-left">
                <button type="submit" class="btn btn-success" id="createButton">修改</button>
        </div>
    </form>
    @endforeach
</div>