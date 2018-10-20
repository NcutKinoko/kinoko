@extends('Backstage.layouts.master')

@section('title', 'HOME')

@section('content')

<div class="container-fluid">
    <h1 style="text-align: center">產品</h1>
    <form action="{{route('store.product')}}" method="POST" role="form" enctype="multipart/form-data" style="margin-bottom: 16px">
        {{ csrf_field() }}
        <div class="form-group">
            <label>產品名稱：</label>
            <input name="name" class="form-control" placeholder="請輸入產品名稱" required>
        </div>
        <div class="form-group">
            <label>產品類別：</label>
            <select name="category" class="form-control" required>
                <option value="" disabled="disabled" selected="selected">請選擇產品類別</option>
                @foreach($CategoryList as $CategoryLists)
                    <option value={{$CategoryLists->id}}>{{$CategoryLists->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>單價：</label>
            <input id="price" name="price" class="form-control" placeholder="請輸入單價" required>
        </div>
        <div class="form-group">
            <label>庫存量：</label>
            <input id="inventory" name="inventory" class="form-control" placeholder="請輸入庫存量" required>
        </div>
        <div class="form-group">
            <label>大小：</label>
            <input name="size" class="form-control" placeholder="請輸入大小" required>
        </div>
        <div class="form-group">
            <label>介紹：</label>
            <textarea name="introduction" class="form-control" placeholder="請輸入介紹"></textarea>
        </div>
        <div class="form-group">
            <label>上傳產品照片：</label>
            <input type="file" class="form-control" name="img" value="{{old('img')}}" placeholder="上傳圖片" required>
        </div>
        <div class="text-left">
            <button type="submit" class="btn btn-success" id="createButton">新增</button>
        </div>
    </form>
    <table class="table" id="categoryTable">
        <thead>
        <tr>
            <th scope="col">產品名稱</th>
            <th scope="col">產品類別</th>
            <th scope="col">單價</th>
            <th scope="col">庫存量</th>
            <th scope="col">大小</th>
            <th scope="col">介紹</th>
            <th scope="col">照片</th>
            <th scope="col">修改/刪除</th>
        </tr>
        </thead>
        <tbody>
        @foreach($product as $products)
            <tr>
                <td class="align-middle">{{$products->name}}</td>
                <td class="align-middle">{{$products->categoryName}}</td>
                <td class="align-middle">{{$products->price}}</td>
                <td class="align-middle">{{$products->inventory}}</td>
                <td class="align-middle">{{$products->size}}</td>
                <td class="align-middle">{{$products->introduction}}</td>
                <td class="align-middle"><img src="{{url('../img/product/' . $products->img)}}" alt="Smiley face" height="100" width="100"></td>
                <td class="align-middle">
                    <a href="{{route('show.product.updateForm',$products->id)}}" class="btn btn-success" style="display: inline-block">修改</a>
                    <form class="delete" action="{{route('destroy.product',$products->id)}}" method="POST" onsubmit="return ConfirmDelete()" style="display: inline-block; margin: 0;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="submit" class="btn btn-danger" value="刪除">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script>
        var createButton = document.getElementById('createButton');
        createButton.addEventListener('click', function (e) {
            var price = document.getElementById('price');
            var inventory = document.getElementById('inventory');
            if (isNaN(price.value)) {
                e.preventDefault();
                alert("價格必須為數字");
            }
            if (isNaN(inventory.value)) {
                e.preventDefault();
                alert("庫存量必須為數字");
            }
        });
        function ConfirmDelete()
        {
            var x = confirm("你確定要刪除此產品嗎?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
</div>
@endsection
