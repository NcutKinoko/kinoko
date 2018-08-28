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
            height: 350px;
            text-align: center;
        }
        .product-list {
            width: 80%;
            height: 80%;
            padding: 0;
            background-color: black;
            margin:0 auto;
        }
        .product-list > ul{
            text-align: center;
            list-style: none;
        }
        .product-list > ul > li{
            width: 400px;
            height: 400px;
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
                <ul>
                    <li><img class="img-size" src="https://i.ytimg.com/vi/bLltMkKxmYA/maxresdefault.jpg"></li>
                    <li><img class="img-size" src="https://i.ytimg.com/vi/bLltMkKxmYA/maxresdefault.jpg"></li>
                    <li><img class="img-size" src="https://i.ytimg.com/vi/bLltMkKxmYA/maxresdefault.jpg"></li>
                </ul>
            </div>
    </div>
@endsection