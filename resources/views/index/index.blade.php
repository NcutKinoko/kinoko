@extends('layouts.master')

@section('title', 'HOME')

@section('content')
    <style>
        .padding
        {
            width: 100%;
            height: 110px;
        }
        .product-list {
            width: 80%;
            background-color: black;
            text-align: center;
        }
        .product-list > ul{
            list-style: none;
        }
        .product-list > ul > li{
            width: 400px;
            height: 400px;
            float: left;
        }
        .img-size{
            width:300px;
            height: 300px;
        }
    </style>
    <div class="padding">

    </div>
    <div class="wrapper">
            <div class="product-list">
                <ul>
                    <li><img class="img-size" src="https://i.ytimg.com/vi/bLltMkKxmYA/maxresdefault.jpg"></li>
                    <li><img class="img-size" src="https://i.ytimg.com/vi/bLltMkKxmYA/maxresdefault.jpg"></li>
                    <li><img class="img-size" src="https://i.ytimg.com/vi/bLltMkKxmYA/maxresdefault.jpg"></li>
                </ul>
            </div>
    </div>
@endsection