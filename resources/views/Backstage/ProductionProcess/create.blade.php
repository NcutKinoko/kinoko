@extends('Backstage.layouts.master')

@section('title', 'HOME')

@section('content')
    <div class="container-fluid">
        <h1 style="text-align: center">產品生產流程</h1>
        <form action="{{route('store.process')}}" method="POST" role="form" enctype="multipart/form-data" style="margin-bottom: 16px">
            {{ csrf_field() }}
            <div class="form-group">
                <label>上傳生產流程圖</label>
                <input type="file" class="form-control" name="img" value="{{old('img')}}" placeholder="上傳圖片" required>
            </div>
            <div class="text-left">
                @if($ProductionProcess->isEmpty())
                    <button type="submit" class="btn btn-success" id="createButton">新增</button>
                @else
                    <button type="submit" class="btn btn-success" id="createButton" disabled>新增</button>
                @endif
            </div>
        </form>
            <table class="table">
                <thead>
                <tr>
                    <th>生產流程圖</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ProductionProcess as $ProductionProcessNew)
                <tr>
                    <td>
                        <img src="{{url('../img/ProductionProcess/' . $ProductionProcessNew->img)}}" alt="Smiley face">
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="{{route('show.process.updateForm',$ProductionProcessNew->id)}}" class="btn btn-success" style="display: inline-block">修改</a>
                        <form class="delete" action="{{route('destroy.process',$ProductionProcessNew->id)}}" method="POST"
                              onsubmit="return ConfirmDelete()" style="display: inline-block">
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
                var x = confirm("你確定要刪除此生產流程圖嗎?");
                if (x)
                    return true;
                else
                    return false;
            }
        </script>
    </div>
@endsection