@extends('Backstage.layouts.master')

@section('title', 'HOME')

@section('content')
    <div class="container-fluid">
        <h1 style="text-align: center">修改產品生產流程</h1>
        @foreach($updateProductionProcess as $updateProductionProcessNew)
            <form action="{{route('update.process', $updateProductionProcessNew->id)}}" method="POST" role="form"
                  enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>上傳產品照片</label>
                    <input type="file" class="form-control" name="img" value="{{old('img')}}" placeholder="上傳圖片"
                           required>
                </div>
                <div class="text-left">
                    <button type="submit" class="btn btn-success" id="createButton">修改</button>
                </div>
            </form>
        @endforeach
    </div>
@endsection