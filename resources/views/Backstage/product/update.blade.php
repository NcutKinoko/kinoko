@extends('Backstage.layouts.master')

@section('title', 'HOME')

@section('content')
<div class="container-fluid">
    <h1 style="text-align: center">修改產品</h1>
    @foreach($updateProduct as $updateProducts)
        <form action="{{route('update.product',$updateProducts->id)}}" method="POST" role="form"
              enctype="multipart/form-data" style="margin-bottom: 16px">
            {{ csrf_field() }}
            <div class="form-group">
                <label>產品名稱</label>
                <input name="name" class="form-control" placeholder="請輸入產品名稱" value="{{$updateProducts->name}}"
                       required>
            </div>
            <div class="form-group">
                <label>產品類別</label>
                <select class="form-control" name="category" required>
                    @if($updateProducts->category_id == 0)
                        <option value="0" selected="selected">此產品未分類</option>
                    @endif
                    @foreach($categoryList as $CategoryLists)
                        @if($CategoryLists->id == $updateProducts->category_id)
                            <option value="{{$CategoryLists->id}}" selected="selected">{{$CategoryLists->name}}</option>
                        @else
                            <option value="{{$CategoryLists->id}}">{{$CategoryLists->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>單價</label>
                <input id="price" name="price" class="form-control" placeholder="請輸入單價"
                       value="{{$updateProducts->price}}" required>
            </div>
            <div class="form-group">
                <label>大小</label>
                <input name="size" class="form-control" placeholder="請輸入大小" value="{{$updateProducts->size}}" required>
            </div>
            <div class="form-group">
                <label>介紹</label>
                <textarea name="introduction" class="form-control" placeholder="請輸入介紹">{{$updateProducts->introduction}}</textarea>
            </div>
            <div class="form-group">
                <label>上傳產品照片</label>
                <input type="file" class="form-control" name="img" value="{{$updateProducts->img}}" placeholder="上傳圖片">
            </div>
            <div class="text-left">
                <button type="submit" class="btn btn-success" id="updateButton">修改</button>
                <a href="{{route('show.product.form')}}" class="btn btn-danger">返回</a>
            </div>
        </form>
    @endforeach
    <script>
        var createButton = document.getElementById('updateButton');
        createButton.addEventListener('click', function (e) {
            var price = document.getElementById('price');
            if (isNaN(price.value)) {
                e.preventDefault();
                alert("價格必須為數字");
            }
        });
    </script>
</div>
    @endsection