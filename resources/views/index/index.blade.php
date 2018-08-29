@extends('layouts.master')

@section('title', 'HOME')

@section('content')
    <style>
        .padding
        {
            width: 100%;
            height: 110px;
        }
        .product
        {
            width: 100%;
            height: 450px;
            text-align: center;
        }
        .product-list {
            width: 90%;
            height: 100%;
            margin: 0 auto;
            padding: 0 70px;
            background-color: black;
            display:inline-block;
        }
        .product-list > h1
        {
            color: #FFFFFF;
        }
        .product-list > ul{
            text-align: center;
            list-style: none;
            padding: 15px;
        }
        .product-list > ul > li{
            width:350px;
            height: 350px;
            display: inline-block;
        }
        .img-size{
            width:300px;
            height: 300px;
        }
    </style>
    <div class="padding">

    </div>
    <div class="product">
            <div class="product-list">
                <h1>產品</h1>
                <h1>PRODUCT</h1>
                <ul>
                    <li><img class="img-size" src="https://i.ytimg.com/vi/bLltMkKxmYA/maxresdefault.jpg"></li>
                    <li><img class="img-size" src="https://i.ytimg.com/vi/bLltMkKxmYA/maxresdefault.jpg"></li>
                    <li><img class="img-size" src="https://i.ytimg.com/vi/bLltMkKxmYA/maxresdefault.jpg"></li>
                </ul>
            </div>
    </div>
@endsection