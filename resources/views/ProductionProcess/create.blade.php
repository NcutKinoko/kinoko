<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<div>
    <form action="{{route('store.process')}}" method="POST" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group" style="width: 50%">
            <label>上傳生產流程圖</label>
            <input type="file" class="form-control" name="img" value="{{old('img')}}" placeholder="上傳圖片" required>
        </div>
        <div class="text-left">
            @if($ProductionProcess->isEmpty())
                <button type="submit" class="btn btn-success" id="createButton">新增</button>
            @else
                <button type="submit" class="btn btn-success" id="createButton" disabled>新增</button>
            @endif
        </div>
    </form>
    <div>
        @foreach($ProductionProcess as $ProductionProcessNew)
            <img src="{{url('../img/ProductionProcess/' . $ProductionProcessNew->img)}}" alt="Smiley face" height="100" width="100">
            <a href="{{route('show.process.updateForm',$ProductionProcessNew->id)}}" class="btn btn-success">修改</a>
            <form class="delete" action="{{route('destroy.process',$ProductionProcessNew->id)}}" method="POST" onsubmit="return ConfirmDelete()">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="submit" class="btn btn-danger" value="刪除此產品">
            </form>
        @endforeach
    </div>
    <script>
        function ConfirmDelete()
        {
            var x = confirm("你確定要刪除此生產流程圖嗎?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
</div>