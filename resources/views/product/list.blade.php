@extends('layouts.master')

@section('title', 'HOME')

@section('content')
    <head>
        <!-- Bootstrap CSS -->
        <title>產品列表</title>
        <link href="{{asset('css/Product-List.css')}}" rel="stylesheet">
        <script src="{{asset('js/Product-List.js')}}"></script>
    </head>
    <!------ Include the above in your HEAD tag ---------->
    <div class="container-fluid">
        <div class="row title-bar justify-content-center align-items-center">
            <h2>產品列表</h2>
        </div>
        <div class="row content-bar">
            <div class="col-md-3">
                <h3 class="category-title">產品類別</h3>
                <ul class="list-group category-list">
                    <li><a href="{{route('product.list')}}">所有產品</a></li>
                    @foreach($categoryList as $categoryLists)
                        <li><a href="{{route('product.group.list',$categoryLists->id)}}">{{$categoryLists->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="row col-md-9 product-list">
                @foreach($productList as $productLists)
                    <div class="col-xs-4 col-lg-4" style="padding-bottom: 30px">
                        <div class="card product">
                            <div class="card-header">{{$productLists->name}}</div>
                            <div class="card-body" style="margin: 20px 0;"><img class="img-thumbnail" src="{{url('../img/product/' . $productLists->img)}}" alt="此商品尚未有圖片" style="width: 100%;height: 100%"></div>
                            <div class="card-footer">
                                <button class="detail-button" onclick="window.location='{{ route("product.detail",$productLists->id) }}'">詳細資訊</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection