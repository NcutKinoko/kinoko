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
            text-align: center;
        }
        .product-list {
            width: 90%;
            height: 100%;
            margin: 0 auto;
            background-color: black;
            display:inline-block;
        }
        .product-list > h1
        {
            color: #FFFFFF;
        }
        .product-list > ul{
            margin-left: 0;
            margin-right: 0;
            text-align: center;
            list-style: none;
            padding: 15px;
        }
        .product-list > ul > li{
            width: 320px;
            height: 320px;
            display: inline-block;
            margin:  1em 0 1em 0;
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