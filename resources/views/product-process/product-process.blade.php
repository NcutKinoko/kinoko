@extends('layouts.master')

@section('title', 'HOME')

@section('content')
    <head>
        <link href="{{asset('css/Product-Process.css')}}" rel="stylesheet">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>eCommerce Product Detail</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    </head>
    <div class="container-fluid">
        <div class="row title-bar justify-content-center align-items-center">
            <h2>香菇生產流程</h2>
        </div>
        <div class="container">
            <div class="wrapper row justify-content-center align-items-center">
                <div class="col-6 img">
                    @foreach($ProductionProcessList as $ProductionProcessLists)
                        <img src="{{url('../img/ProductionProcess/' . $ProductionProcessLists->img)}}" alt="尚未有圖片">
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection