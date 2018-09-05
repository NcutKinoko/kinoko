<div>
    <form action="#" method="POST" role="form" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div class="form-group">
            <label>類別名稱</label>
            <input name="name" class="form-control" placeholder="請輸入產品名稱">
        </div>
        <div class="form-group">
            <label>單價</label>
            <input name="name" class="form-control" placeholder="請輸入單價">
        </div>
        <div class="form-group">
            <label>庫存量</label>
            <input name="name" class="form-control" placeholder="請輸入庫存量">
        </div>
        <div class="form-group">
            <label>大小</label>
            <input name="name" class="form-control" placeholder="請輸入大小">
        </div>
        <div class="form-group">
            <label>上傳產品照片</label>
            <input type="file" class="form-control" name="picture" value="{{old('picture')}}" placeholder="上傳圖片">
        </div>
        <div class="text-left">
            <button type="submit" class="btn btn-success">新增</button>
        </div>
    </form>
</div>