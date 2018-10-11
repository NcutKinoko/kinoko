@extends('layouts.master')

@section('title', 'HOME')

@section('content')
    <head>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{asset('css/index.css')}}" rel="stylesheet">
        <script type="text/javascript" src="{{asset('js/index.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </head>
    <div class="padding">

    </div>
    <br>
    <br>
    <div class="container-fluid container-background-color">
        <div class="row">
            <div class="col-md-12 text-center title-format">
                <h1>產品</h1>
                <h1>PRODUCT</h1>
            </div>
        </div>
        <br>
        <div id="carouselProduct" class="carousel slide" data-ride="carousel" data-interval="9000">
            <div class="carousel-inner row w-100 mx-auto" role="listbox">
                <?php $count = 0?>
                @foreach($productList as $productLists)
                    <?php $count += 1?>
                    @if($count == 1)
                <div class="carousel-item col-md-3 active">
                    <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400/000/fff?text={{$count}}" alt="slide {{$count}}">
                </div>
                        @else
                <div class="carousel-item col-md-3">
                    <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400?text={{$count}}" alt="slide {{$count}}">
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
        <br>
        <div class="row">
            <div class="col-md-12 text-center title-format">
                <h1>菜餚</h1>
                <h1>Menu</h1>
            </div>
        </div>
        <br>
        <div id="carouselMenu" class="carousel slide" data-ride="carousel" data-interval="9000">
            <div class="carousel-inner row w-100 mx-auto" role="listbox">
                <?php $count = 0?>
                @foreach($menuList as $menuLists)
                    <?php $count += 1?>
                    @if($count == 1)
                        <div class="carousel-item col-md-3 active">
                            <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400/000/fff?text={{$count}}" style="height: 300px;width: 500px" alt="slide 1">
                        </div>
                    @else
                        <div class="carousel-item col-md-3">
                            <img class="img-fluid mx-auto d-block" src="//placehold.it/600x400/000/fff?text={{$count}}" style="height: 300px;width: 500px" alt="slide 2">
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
<br>
@endsection