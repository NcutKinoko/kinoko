<div>
    <form action="{{route('store.menu')}}" method="POST" role="form" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div class="form-group">
            <label>料理名稱</label>
            <input name="name" class="form-control" placeholder="請輸入料理名稱" required>
        </div>
        <div class="form-group">
            <label>調味料</label>
            <input name="seasoning" class="form-control" placeholder="請輸入調味料名稱" required>
        </div>
        <div class="form-group">
            <label>材料</label>
            <input name="material" class="form-control" placeholder="請輸入材料名稱" required>
        </div>
        <div class="form-group">
            <label>使用產品</label>
            <select name="product" required>
                <option value="" disabled="disabled" selected="selected">請選擇使用產品</option>
                @foreach($productList as $productLists)
                    <option value={{$productLists->id}}>{{$productLists->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>使用醬汁</label>
            <select name="sauce" required>
                <option value="" disabled="disabled" selected="selected">請選擇使用醬汁</option>
                @foreach($sauceList as $sauceLists)
                    <option value={{$sauceLists->id}}>{{$sauceLists->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>備註</label>
            <textarea name="remark" class="form-control" placeholder="請輸入備註" required></textarea>
        </div>
        <div class="form-group">
            <label>上傳菜餚照片</label>
            <input type="file" class="form-control" name="img" value="{{old('img')}}" placeholder="上傳圖片" required>
        </div>
        <div class="text-left">
            <button type="submit" class="btn btn-success">新增</button>
        </div>
    </form>
</div>
