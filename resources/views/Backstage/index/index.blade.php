@extends('Backstage.layouts.master')

@section('title', 'HOME')

@section('content')
    <div class="container-fluid">
        @if(\Illuminate\Support\Facades\Auth::guard('backstage')->check())
            <h1 style="text-align: center; vertical-align: middle">歡迎進入後台</h1>
        @else
            <h1 style="text-align: center; vertical-align: middle">如果尚未成為會員請先進行註冊，如已為會員請登入</h1>
        @endif
    </div>
@endsection