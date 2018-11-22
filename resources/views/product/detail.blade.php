@extends('layouts.master')

@section('title', 'HOME')

@section('content')
    <head>
        <link href="{{asset('css/Product-Detail.css')}}" rel="stylesheet">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>產品詳細資訊</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    </head>
    <div class="container-fluid">
        <div class="row title-bar justify-content-center align-items-center">
            <h2>產品詳細資訊</h2>
        </div>
        <div class="container">
            <div class="card">
                <div class="container-fluid">
                    <div class="wrapper row">
                        @foreach($productDetail as $productDetails)
                            <div class="preview col-md-6">
                                <div class="preview-pic tab-content">
                                    <div class="cover">
                                        <div class="tab-pane active" id="pic-1"><img src="{{url('../img/product/' . $productDetails->img)}}"/></div>
                                    </div>
                                </div>
                            </div>
                            <div class="details col-md-6">
                                <h3 class="product-title">{{$productDetails->productName}}</h3>
                                <h5 class="category">產品類別：
                                    <span data-toggle="tooltip" title="small">{{$productDetails->categoryName}}</span>
                                </h5>
                                <h4 class="price">售價 <span>${{$productDetails->price}}</span></h4>
                                <h4 class="sizes">大小：
                                    <span class="size" data-toggle="tooltip" title="small">{{$productDetails->size}}</span>
                                </h4>
                                <h4 class="introduction">商品介紹：</h4>
                                <p class="product-description">{!! $productDetails->introduction !!}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

