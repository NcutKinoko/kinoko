@extends('Backstage.layouts.master')

@section('title', 'HOME')

@section('content')
<div class="container-fluid">
    <h1 style="text-align: center">修改菜單</h1>
    @foreach($updateMenu as $updateMenus)
    <form action="{{route('update.menu',$updateMenus->id)}}" method="POST" role="form" enctype="multipart/form-data" style="margin-bottom: 16px">
        {{ csrf_field() }}
        <div class="form-group">
            <label>料理名稱</label>
            <input name="name" class="form-control" placeholder="請輸入料理名稱" value="{{$updateMenus->name}}" required>
        </div>
        <div class="form-group">
            <label>調味料</label>
            <input name="seasoning" class="form-control" placeholder="請輸入調味料資料" value="{{$updateMenus->seasoning}}">
        </div>
        <div class="form-group">
            <label>材料</label>
            <input name="material" class="form-control" placeholder="請輸入材料資料" value="{{$updateMenus->material}}" required>
        </div>
        <div class="form-group">
            <label>使用產品</label>
            <select class="form-control" name="product" required>
                @if($updateMenus->product_id == 0)
                    <option value="0" selected="selected">此菜餚未使用產品</option>
                @endif
                @foreach($productList as $productLists)
                    @if($productLists->id == $updateMenus->product_id)
                        <option value="{{$productLists->id}}" selected="selected">{{$productLists->name}}</option>
                    @else
                        <option value="{{$productLists->id}}">{{$productLists->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>醬汁</label>
            <input name="sauce" class="form-control" placeholder="請輸入醬汁資料" value="{{$updateMenus->sauce}}">
        </div>
        <div class="form-group">
            <label>備註</label>
            <textarea name="remark" class="form-control" placeholder="請輸入備註">{{$updateMenus->remark}}</textarea>
        </div>
        <div class="form-group">
            <label>上傳菜餚照片</label>
            <input type="file" class="form-control" name="img" placeholder="上傳圖片">
        </div>
        <div class="text-left">
            <button type="submit" class="btn btn-success">修改</button>
            <a href="{{route('show.menu.form')}}" class="btn btn-danger">返回</a>
        </div>
    </form>
        @endforeach
</div>
    @endsection