@extends('layouts.master')

@section('title', 'HOME')

@section('content')
    <head>
        <link href="{{asset('css/Farmer-Detail.css')}}" rel="stylesheet">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>eCommerce Product Detail</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    </head>
    <div class="container-fluid">
        <div class="row title-bar justify-content-center align-items-center">
            <h2>菇農詳細資訊</h2>
        </div>
        <div class="container">
            <div class="card">
                <div class="container-fluid">
                    <div class="wrapper row">
                        @foreach($farmerDetail as $farmerDetails)
                            <div class="preview col-md-6">
                                <div class="preview-pic tab-content">
                                    <img src="{{url('../img/farmer/' . $farmerDetails->img)}}"/></div>
                            </div>
                            <div class="details col-md-6">
                                <h3 class="farmer-name">{{$farmerDetails->name}}</h3>
                                <h4 class="age">年齡：
                                    <span data-toggle="tooltip" title="small">{{$farmerDetails->age}}</span>
                                </h4>
                                <h4 class="phone">連絡電話：
                                    <span data-toggle="tooltip" title="small">{{$farmerDetails->phone}}</span>
                                </h4>
                                <h4 class="area">農業經營專區：
                                    <span data-toggle="tooltip" title="small">{{$farmerDetails->area}}</span>
                                </h4>
                                <h4 class="class">班別：
                                    <span data-toggle="tooltip" title="small">{{$farmerDetails->class}}</span>
                                </h4>
                                <h4 class="PlantingArea">種植面積：
                                    <span data-toggle="tooltip" title="small">{{$farmerDetails->PlantingArea}}</span>
                                </h4>
                                <h4 class="PlantingQuantity">栽種包數：
                                    <span data-toggle="tooltip"
                                          title="small">{{$farmerDetails->PlantingQuantity}}</span>
                                </h4>
                                <h4 class="PlantingYear">栽種年資：
                                    <span data-toggle="tooltip" title="small">{{$farmerDetails->PlantingYear}}</span>
                                </h4>
                                <h4 class="result">經營現況與成果：</h4>
                                <p class="product-description">{{$farmerDetails->result}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection