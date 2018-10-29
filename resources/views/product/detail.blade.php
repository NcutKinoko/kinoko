@extends('layouts.master')

@section('title', 'HOME')

@section('content')
    <head>
        <link href="{{asset('css/Product-Detail.css')}}" rel="stylesheet">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>eCommerce Product Detail</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    </head>
    <div class="container-fluid">
        <div class="row title-bar justify-content-center align-items-center">
            <h2>產品詳細資訊</h2>
        </div>
        <div class="container">
            <div class="card">
                <div class="container-fliud">
                    <div class="wrapper row">
                        @foreach($productDetail as $productDetails)
                            <div class="preview col-md-6">
                                <div class="preview-pic tab-content">
                                    <div class="cover">
                                        <div class="tab-pane active" id="pic-1"><img src="{{url('../img/product/' . $productDetails->img)}}"/></div>
                                    </div>
                                    {{--<div class="tab-pane" id="pic-2"><img src="{{url('../img/product/' . $productDetails->img)}}"/></div>--}}
                                    {{--<div class="tab-pane" id="pic-3"><img src="{{url('../img/product/' . $productDetails->img)}}"/></div>--}}
                                    {{--<div class="tab-pane" id="pic-4"><img src="{{url('../img/product/' . $productDetails->img)}}"/></div>--}}
                                    {{--<div class="tab-pane" id="pic-5"><img src="{{url('../img/product/' . $productDetails->img)}}"/></div>--}}
                                </div>
                                {{--<ul class="preview-thumbnail nav nav-tabs">--}}
                                {{--<li class="active"><a data-target="#pic-1" data-toggle="tab"><img--}}
                                {{--src="http://placekitten.com/200/126"/></a></li>--}}
                                {{--<li><a data-target="#pic-2" data-toggle="tab"><img--}}
                                {{--src="http://placekitten.com/200/126"/></a></li>--}}
                                {{--<li><a data-target="#pic-3" data-toggle="tab"><img--}}
                                {{--src="http://placekitten.com/200/126"/></a></li>--}}
                                {{--<li><a data-target="#pic-4" data-toggle="tab"><img--}}
                                {{--src="http://placekitten.com/200/126"/></a></li>--}}
                                {{--<li><a data-target="#pic-5" data-toggle="tab"><img--}}
                                {{--src="http://placekitten.com/200/126"/></a></li>--}}
                                {{--</ul>--}}
                            </div>
                            <div class="details col-md-6">
                                <h3 class="product-title">{{$productDetails->productName}}</h3>
                                <h5 class="category">產品類別：
                                    <span data-toggle="tooltip" title="small">{{$productDetails->categoryName}}</span>
                                </h5>
                                {{--<div class="rating">--}}
                                {{--<div class="stars">--}}
                                {{--<span class="fa fa-star checked"></span>--}}
                                {{--<span class="fa fa-star checked"></span>--}}
                                {{--<span class="fa fa-star checked"></span>--}}
                                {{--<span class="fa fa-star"></span>--}}
                                {{--<span class="fa fa-star"></span>--}}
                                {{--</div>--}}
                                {{--<span class="review-no">41 reviews</span>--}}
                                {{--</div>--}}
                                <h4 class="price">售價 <span>${{$productDetails->price}}</span></h4>
                                {{--<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong>--}}
                                {{--</p>--}}
                                <h4 class="sizes">大小：
                                    <span class="size" data-toggle="tooltip" title="small">{{$productDetails->size}}</span>
                                </h4>
                                <h4 class="introduction">商品介紹：</h4>
                                <p class="product-description">{{$productDetails->introduction}}</p>
                                {{--<h5 class="colors">colors:--}}
                                {{--<span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>--}}
                                {{--<span class="color green"></span>--}}
                                {{--<span class="color blue"></span>--}}
                                {{--</h5>--}}
                                {{--<div class="action">--}}
                                    {{--<button class="add-to-cart btn btn-default" type="button">add to cart</button>--}}
                                    {{--<button class="like btn btn-default" type="button"><span class="fa fa-heart"></span>--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

