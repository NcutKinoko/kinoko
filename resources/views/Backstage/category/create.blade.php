<div>
    <form action="{{route('store.category')}}" method="POST" role="form" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div class="form-group">
            <label>產品類別名稱</label>
            <input name="name" class="form-control" placeholder="請輸入產品類別名稱" required>
        </div>
        <div class="text-left">
            <button type="submit" class="btn btn-success">新增</button>
        </div>
    </form>
</div>