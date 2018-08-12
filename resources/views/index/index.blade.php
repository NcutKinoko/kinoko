@extends('layouts.master')

@section('title', 'HOME')

@section('content')
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #AA7700;
            text-align: center;
        }

        li {
            display: inline-block;
        }

        li a {
            display: inline-block;
            color: black;
            text-decoration: none;
            padding: 14px 50px;
        }

        li a:hover {
            background-color: white;
            color: #AA7700;
            font-weight: bold;
        }
    </style>

    <!--navigation-->
    <div>
        <ul>
            <li><a href="#index">首頁</a></li>
            <li><a href="#register">註冊</a></li>
            <li><a href="#login">登入</a></li>
            <li><a href="#history">歷史</a></li>
        </ul>
    </div>
@endsection