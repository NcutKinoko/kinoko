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
            <h2>菜餚列表</h2>
        </div>
        <div class="container">
            <div class="row menu-list">
                @foreach($MenuList as $MenuLists)
                    <div class="col-xs-4 col-lg-4" style="padding-bottom: 30px">
                        <div class="card menu">
                            <div class="card-header">{{$MenuLists->name}}</div>
                            <div class="card-body thumbnail" style="margin: 20px 0;"><img class="rounded"
                                                                                          src="{{url('../img/menu/' . $MenuLists->img)}}" alt="此菜餚尚未有照片"
                                                                                          style="width: 100%;height: 100%"></div>
                            <div class="card-footer">
                                <button class="detail-button"
                                        onclick="window.location='{{ route("menu.detail",$MenuLists->id) }}'">詳細資訊
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection