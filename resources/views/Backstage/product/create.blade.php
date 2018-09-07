<div>
    <form action="{{route('store.product')}}" method="POST" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>產品名稱</label>
            <input name="name" class="form-control" placeholder="請輸入產品名稱" required>
        </div>
        <div class="form-group">
            <label>產品類別</label>
            <select name="category" required>
                <option value="" disabled="disabled" selected="selected">請選擇產品類別</option>
                @foreach($CategoryList as $CategoryLists)
                    <option value={{$CategoryLists->id}}>{{$CategoryLists->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>單價</label>
            <input name="price" class="form-control" placeholder="請輸入單價" required>
        </div>
        <div class="form-group">
            <label>庫存量</label>
            <input name="inventory" class="form-control" placeholder="請輸入庫存量" required>
        </div>
        <div class="form-group">
            <label>大小</label>
            <input name="size" class="form-control" placeholder="請輸入大小" required>
        </div>
        <div class="form-group">
            <label>上傳產品照片</label>
            <input type="file" class="form-control" name="img" value="{{old('picture')}}" placeholder="上傳圖片" required>
        </div>
        <div class="text-left">
            <button type="submit" class="btn btn-success">新增</button>
        </div>
    </form>
</div>