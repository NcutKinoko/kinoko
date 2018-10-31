@extends('layouts.master')

@section('title', 'HOME')

@section('content')
    <head>
        <link href="{{asset('css/kinoko-standard.css')}}" rel="stylesheet">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>eCommerce Product Detail</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    </head>
    <div class="container-fluid">
        <div class="row title-bar justify-content-center align-items-center">
            <h2>優質香菇評鑑標準表</h2>
        </div>
        <div class="container">
            <div class="row panel-design">
                <div class="col-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">項目</th>
                            <th scope="col">配分</th>
                            <th scope="col">測定方法</th>
                            <th scope="col">評分說明</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($KinokoStandard as $KinokoStandards)
                            <tr>
                                <td class="align-middle">{{$KinokoStandards->item}}</td>
                                <td class="align-middle">{{$KinokoStandards->distribution}}</td>
                                <td class="align-middle">{{$KinokoStandards->TestMethod}}</td>
                                <td class="align-middle">
                                    @foreach($RatingDescription as $RatingDescriptions)
                                        @if($KinokoStandards->id == $RatingDescriptions->KinokoStandard_id)
                                            <span class="description">{{$RatingDescriptions->content}}</span>
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection