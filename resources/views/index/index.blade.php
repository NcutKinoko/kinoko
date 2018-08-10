@extends('layouts.master')

@section('title', 'HOME')

@section('content')
    <style>
        ul{
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 20px;
            background-color: #f1f1f1;;
        }
        li{
            float: left;
            color: black;
            overflow: auto;
        }
    </style>

    <!--navigation-->
    <div>
        <ul>
            <li>首頁</li>
            <li>註冊</li>
            <li>登入</li>
            <li>歷史</li>
        </ul>
    </div>
@endsection