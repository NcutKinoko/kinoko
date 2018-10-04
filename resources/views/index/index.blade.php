@extends('layouts.master')

@section('title', 'HOME')

@section('content')
    <head>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{asset('css/index.css')}}" rel="stylesheet">
        <link href="{{asset('js/index.js')}}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <br>
    <div class="container-fluid container-background-color">
        <div class="row">
            <div class="col-md-12 text-center title-format">
                <h1>產品</h1>
                <h1>PRODUCT</h1>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12 text-center slide-format">
                <div id="carouselProduct" class="carousel slide" data-ride="carousel" data-interval="9000">
                    <div class="carousel-inner row w-100 mx-auto" role="listbox">
                        <?php $count = 0?>
                        @foreach($productList as $productLists)
                            <?php $count += 1?>
                            @if($count == 1)
                                <div class="carousel-item col-md-3 active ListName-format">
                                    <img class="img-fluid mx-auto d-block"
                                         src="{{url('../img/product/' . $productLists->img)}}"
                                         alt="slide {{$count}}">
                                    <h3>{{$productLists->name}}</h3>
                                </div>
                            @else
                                <div class="carousel-item col-md-3 ListName-format">
                                    <img class="img-fluid mx-auto d-block"
                                         src="{{url('../img/product/' . $productLists->img)}}"
                                         alt="slide {{$count}}">
                                    <h3>{{$productLists->name}}</h3>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselProduct" role="button" data-slide="prev">
                        <i class="fa fa-chevron-left fa-lg text-muted"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next text-faded" href="#carouselProduct" role="button" data-slide="next">
                        <i class="fa fa-chevron-right fa-lg text-muted"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12 text-center title-format">
                <h1>菜餚</h1>
                <h1>Menu</h1>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12 text-center slide-format">
                <div id="carouselMenu" class="carousel slide " data-ride="carousel" data-interval="9000">
                    <div class="carousel-inner row w-100 mx-auto" role="listbox">
                        <?php $count = 0?>
                        @foreach($menuList as $menuLists)
                            <?php $count += 1?>
                            @if($count == 1)
                                <div class="carousel-item col-md-3 active ListName-format">
                                    <img class="img-fluid mx-auto d-block"
                                         src="{{url('../img/menu/' . $menuLists->img)}}"
                                         alt="slide {{$count}}">
                                    <h3>{{$menuLists->name}}</h3>
                                </div>
                            @else
                                <div class="carousel-item col-md-3 ListName-format">
                                    <img class="img-fluid mx-auto d-block"
                                         src="{{url('../img/menu/' . $menuLists->img)}}"
                                         alt="slide {{$count}}">
                                    <h3>{{$menuLists->name}}</h3>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselMenu" role="button" data-slide="prev">
                        <i class="fa fa-chevron-left fa-lg text-muted"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next text-faded" href="#carouselMenu" role="button" data-slide="next">
                        <i class="fa fa-chevron-right fa-lg text-muted"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
<br>
@endsection