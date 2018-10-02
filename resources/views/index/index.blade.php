@extends('layouts.master')

@section('title', 'HOME')

@section('content')
    <div class="container-fluid container-background-color">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>產品</h1>
                <h1>PRODUCT</h1>
            </div>
        </div>
        <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="9000">
            <div class="carousel-inner row w-100 mx-auto" role="listbox">
                @foreach($productList as $productLists)
                        <div class="carousel-item col-md-3 active">
                            <img class="img-fluid mx-auto d-block" src="{{url('../img/product/' . $productLists->img)}}"
                                 alt="slide 1">
                        </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                <i class="fa fa-chevron-left fa-lg text-muted"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
                <i class="fa fa-chevron-right fa-lg text-muted"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
@endsection