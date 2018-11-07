@extends('Backstage.layouts.master')

@section('title', 'HOME')

@section('content')
    <div class="container-fluid">
        <h1 style="text-align: center">Footer資訊</h1>
        <form action="{{route('store.footer')}}" method="POST" role="form" enctype="multipart/form-data"
              style="margin-bottom: 16px">
            {{ csrf_field() }}
            <div class="form-group">
                <label>電話：</label>
                <input name="phone" class="form-control" placeholder="請輸入電話號碼">
            </div>
            <div class="form-group">
                <label>地址：</label>
                <input id="address" name="address" class="form-control" placeholder="請輸入地址">
            </div>
            <div class="form-group">
                <label>製作年份：</label>
                <input id="ProductionYear" name="ProductionYear" class="form-control" placeholder="請輸入製作年分">
            </div>
            <div class="form-group">
                <label>協助單位：</label>
                <input name="AssistingUnit" class="form-control" placeholder="請輸入協助單位">
            </div>
            <div class="form-group">
                <label>提供單位：</label>
                <input name="ProvidingUnit" class="form-control" placeholder="請輸入提供單位">
            </div>
            <div class="text-left">
                @if($footerList->isEmpty())
                    <button type="submit" class="btn btn-success" id="createButton">新增</button>
                @else
                    <button type="submit" class="btn btn-success" id="createButton" disabled>新增</button>
                @endif
            </div>
        </form>
        <table class="table" id="productTable">
            <thead>
            <tr>
                <th scope="col">電話</th>
                <th scope="col">地址</th>
                <th scope="col">製作年份</th>
                <th scope="col">協助單位</th>
                <th scope="col">提供單位</th>
                <th scope="col">修改/刪除</th>
            </tr>
            </thead>
            <tbody>
            @foreach($footerList as $footerLists)
                <tr>
                    <td class="align-middle">{{$footerLists->phone}}</td>
                    <td class="align-middle">{{$footerLists->address}}</td>
                    <td class="align-middle">{{$footerLists->ProductionYear	}}</td>
                    <td class="align-middle">{{$footerLists->AssistingUnit}}</td>
                    <td class="align-middle">{{$footerLists->ProvidingUnit}}</td>
                    <td class="align-middle">
                        <a href="{{route('show.footer.updateForm',$footerLists->id)}}" class="btn btn-success"
                           style="display: inline-block">修改</a>
                        <form class="delete" action="{{route('destroy.footer',$footerLists->id)}}" method="POST"
                              onsubmit="return ConfirmDelete()" style="display: inline-block; margin: 0;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <input type="submit" class="btn btn-danger" value="刪除">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <script>
            function ConfirmDelete() {
                var x = confirm("你確定要刪除此footer資訊嗎?");
                if (x)
                    return true;
                else
                    return false;
            }
        </script>
    </div>
@endsection
