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
        @foreach($DetailMenu as $DetailMenus)
            <div class="container">
                <div class="row panel-design">
                    <div class="col-12">
                        <div class="row Name">
                            <div class="col-12">
                                <div class="row NameTitle align-items-center">
                                    <div class="col-12">
                                        <h4>料理名稱</h4>
                                    </div>
                                </div>
                                <div class="row NameContent">
                                    <div class="col-12">
                                        <h4>{{$DetailMenus->MenuName}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row Seasoning-Product-Sauce">
                            <div class="col-4">
                                <div class="row SeasoningTitle align-items-center">
                                    <div class="col-12">
                                        <h4>調味料</h4>
                                    </div>
                                </div>
                                <div class="row SeasoningContent">
                                    <div class="col-12">
                                        <h4>{{$DetailMenus->seasoning}}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row ProductTitle align-items-center">
                                    <div class="col-12">
                                        <h4>使用產品</h4>
                                    </div>
                                </div>
                                <div class="row ProductContent align-items-center">
                                    <div class="col-12">
                                        <h4>{{$DetailMenus->ProductName}}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row SauceTitle align-items-center">
                                    <div class="col-12">
                                        <h4>醬汁</h4>
                                    </div>
                                </div>
                                <div class="row SauceContent">
                                    <div class="col-12">
                                        <h4>{{$DetailMenus->sauce}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row Img">
                            <div class="col-12">
                                <div class="row ImgTitle align-items-center">
                                    <div class="col-12">
                                        <h4>照片</h4>
                                    </div>
                                </div>
                                <div class="row ImgContent">
                                    <div class="col-12">
                                        <img class="img-thumbnail Menu-Img" src="{{url('../img/menu/' . $DetailMenus->img)}}" alt="Smiley face">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row Remark-Material">
                            <div class="col-6">
                                <div class="row Remark">
                                    <div class="col-12">
                                        <div class="row RemarkTitle align-items-center">
                                            <div class="col-12">
                                                <h4>備註</h4>
                                            </div>
                                        </div>
                                        <div class="row RemarkContent">
                                            <div class="col-12">
                                                <h4>{{$DetailMenus->remark}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row Material">
                                    <div class="col-12">
                                        <div class="row MaterialTitle align-items-center">
                                            <div class="col-12">
                                                <h4>使用材料</h4>
                                            </div>
                                        </div>
                                        <div class="row MaterialContent">
                                            <div class="col-12">
                                                <h4>{{$DetailMenus->material}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row Step">
                            <div class="col-12">
                                <div class="row StepTitle align-items-center">
                                    <div class="col-12">
                                        <h4>料理步驟</h4>
                                    </div>
                                </div>
                                <div class="row StepContent">
                                    <div class="col-12">
                                        @foreach($DetailStep as $DetailSteps)
                                            <h4>{{$DetailSteps->step}}</h4>.
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection