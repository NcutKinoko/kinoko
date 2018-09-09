<div>
    <form action="{{route('store.sauce')}}" method="POST" role="form" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div class="form-group">
            <label>醬汁名稱</label>
            <input name="name" class="form-control" placeholder="請輸入醬汁名稱" required>
        </div>
        <div class="form-group">
            <label>使用材料</label>
            <textarea name="material" class="form-control" placeholder="請輸入醬汁使用材料" required></textarea>
        </div>
        <div class="form-group">
            <label>上傳醬汁照片</label>
            <input type="file" class="form-control" name="img" value="{{old('img')}}" placeholder="上傳圖片" required>
        </div>
        <div class="text-left">
            <button type="submit" class="btn btn-success">新增</button>
        </div>
    </form>
</div>