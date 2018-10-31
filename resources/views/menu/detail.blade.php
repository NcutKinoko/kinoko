@extends('layouts.master')

@section('title', 'HOME')

@section('content')
    <head>
        <!-- Bootstrap CSS -->
        <link href="{{asset('css/Menu-List.css')}}" rel="stylesheet">
    </head>
    <!------ Include the above in your HEAD tag ---------->
    <div class="container-fluid">
        <div class="row title-bar justify-content-center align-items-center">
            <h2>菜餚詳細資訊</h2>
        </div>
    </div>
@endsection