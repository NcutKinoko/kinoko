@extends('layouts.master')

@section('title', 'HOME')

@section('content')
    <head>
        <!-- Bootstrap CSS -->
        <link href="{{asset('css/Product-List.css')}}" rel="stylesheet">
        <script src="{{asset('js/Product-List.js')}}"></script>
    </head>
    <!------ Include the above in your HEAD tag ---------->
    <div class="container-fluid">
        <div class="d-flex title-bar justify-content-center align-items-center">
            <h3>產品列表</h3>
        </div>
        <div class="row content-bar">
            <ul class="col-md-3 list-group category-list">
                @foreach($categoryList as $categoryLists)
                <li><a href="">{{$categoryLists->name}}</a></li>
                @endforeach
            </ul>
            <div id="products" class="row col-md-9">
                @foreach($productList as $productLists)
                    <div class="card  col-xs-4 col-lg-4">
                        <div class="card-header">{{$productLists->name}}</div>
                        <div class="card-body"></div>
                        <div class="card-footer">Footer</div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection