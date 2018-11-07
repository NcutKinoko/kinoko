@extends('Backstage.layouts.master')

@section('title', 'HOME')

@section('content')
    <div class="container-fluid">
        <h1 style="text-align: center">Footer資訊</h1>
        @foreach($updateFooter as $updateFooters)
            <form action="{{route('update.footer',$updateFooters->id)}}" method="POST" role="form"
                  enctype="multipart/form-data"
                  style="margin-bottom: 16px">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>電話：</label>
                    <input name="phone" class="form-control" placeholder="請輸入電話號碼" value="{{$updateFooters->phone}}">
                </div>
                <div class="form-group">
                    <label>地址：</label>
                    <input id="address" name="address" class="form-control" placeholder="請輸入地址"
                           value="{{$updateFooters->address}}">
                </div>
                <div class="form-group">
                    <label>製作年份：</label>
                    <input id="ProductionYear" name="ProductionYear" class="form-control" placeholder="請輸入製作年分"
                           value="{{$updateFooters->ProductionYear}}">
                </div>
                <div class="form-group">
                    <label>協助單位：</label>
                    <input name="AssistingUnit" class="form-control" placeholder="請輸入協助單位"
                           value="{{$updateFooters->AssistingUnit}}">
                </div>
                <div class="form-group">
                    <label>提供單位：</label>
                    <input name="ProvidingUnit" class="form-control" placeholder="請輸入提供單位"
                           value="{{$updateFooters->ProvidingUnit}}">
                </div>
                <div class="text-left">
                    <button type="submit" class="btn btn-success" id="createButton">修改</button>
                    <a href="{{route('show.footer.form')}}" class="btn btn-danger">返回</a>
                </div>
            </form>
        @endforeach
    </div>
@endsection
