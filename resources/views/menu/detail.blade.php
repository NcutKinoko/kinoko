@extends('layouts.master')

@section('title', 'HOME')

@section('content')
    <head>
        <!-- Bootstrap CSS -->
        <link href="{{asset('css/Menu-Detail.css')}}" rel="stylesheet">
    </head>
    <!------ Include the above in your HEAD tag ---------->
    <div class="container-fluid">
        <div class="row title-bar justify-content-center align-items-center">
            <h2>菜餚詳細資訊</h2>
        </div>
            <div class="card">
                <div class="container-fluid">
                    <div class="wrapper row">
                        @foreach($DetailMenu as $DetailMenus)
                            <div class="preview col-md-6">
                                <div class="preview-pic tab-content">
                                    <div class="cover">
                                        <div class="tab-pane active" id="pic-1"><img
                                                    src="{{url('../img/menu/' . $DetailMenus->img)}}"/></div>
                                    </div>
                                </div>
                            </div>
                            <div class="details col-md-6">
                                <h3 class="menu-title">{{$DetailMenus->MenuName}}</h3>
                                <h4 class="product">使用產品： <span>{{$DetailMenus->ProductName}}</span></h4>
                                <h4 class="seasoning">調味料： <span>{{$DetailMenus->seasoning}}</span></h4>
                                <h4 class="material">材料： <span>{{$DetailMenus->material}}</span></h4>
                                <h4 class="sauce">醬汁： <span>{{$DetailMenus->sauce}}</span></h4>
                                <h4 class="remark">備註： <span>{{$DetailMenus->remark}}</span></h4>
                                <h4 class="step">製作步驟：</h4>
                                @foreach($DetailStep as $DetailSteps)
                                    <span class="step-list">{{$DetailSteps->step}}</span>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </div>
@endsection