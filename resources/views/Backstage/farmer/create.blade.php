@extends('Backstage.layouts.master')

@section('title', 'HOME')

@section('content')
<div class="container-fluid">
    <h1 style="text-align: center">菇農資料</h1>
    <form action="{{route('store.farmer')}}" method="POST" role="form" enctype="multipart/form-data" style="margin-bottom: 16px">
        {{ csrf_field() }}
        <div class="form-group">
            <label>姓名</label>
            <input name="name" class="form-control" placeholder="請輸入姓名" required>
        </div>
        <div class="form-group">
            <label>年齡</label>
            <input name="age" id="age" class="form-control" placeholder="請輸入年齡">
        </div>
        <div class="form-group">
            <label>連絡電話</label>
            <input name="phone" id="phone" class="form-control" placeholder="請輸入電話號碼" required>
        </div>
        <div class="form-group">
            <label>農業經營專區</label>
            <input name="area" class="form-control" placeholder="請輸入農業經營專區" required>
        </div>
        <div class="form-group">
            <label>班別</label>
            <input name="class" class="form-control" placeholder="請輸入班別" required>
        </div>
        <div class="form-group">
            <label>種植面積</label>
            <input name="PlantingArea" class="form-control" placeholder="請輸入種植面積" required>
        </div>
        <div class="form-group">
            <label>栽種包數</label>
            <input name="PlantingQuantity" class="form-control" placeholder="請輸入栽種包數" required>
        </div>
        <div class="form-group">
            <label>栽種年資</label>
            <input name="PlantingYear" class="form-control" placeholder="請輸入栽種年資" required>
        </div>
        <div class="form-group">
            <label>經營現況與成果</label>
            <textarea name="result" class="form-control" placeholder="請輸入經營現況與成果"></textarea>
        </div>
        <div class="form-group">
            <label>上傳菇農照片</label>
            <input type="file" class="form-control" name="img" value="{{old('img')}}" placeholder="上傳圖片" required>
        </div>
        <div class="text-left">
            <button type="submit" id="createButton" class="btn btn-success">新增</button>
        </div>
    </form>

    <form action="{{route('search.farmer')}}" method="POST" class="card card-sm" style="margin-bottom: 16px;">
        {{ csrf_field() }}
        <div class="card-body row no-gutters align-items-center">
            <!--end of col-->
            <div class="col">
                <input class="form-control form-control-lg form-control-borderless" name="search" type="search"
                       placeholder="搜尋菇農名稱" required>
            </div>
            <!--end of col-->
            <div class="col-auto">
                <button class="btn btn-lg btn-success" type="submit">搜尋</button>
            </div>
            <!--end of col-->
        </div>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">姓名</th>
            <th scope="col">年齡</th>
            <th scope="col">連絡電話</th>
            <th scope="col">農業經營專區</th>
            <th scope="col">班別</th>
            <th scope="col">種植面積</th>
            <th scope="col">栽種包數</th>
            <th scope="col">栽種年資</th>
            <th scope="col">經營現況與成果</th>
            <th scope="col">修改/刪除</th>
            <th scope="col">圖片</th>
        </tr>
        </thead>
        <tbody>
        @foreach($farmerList as $farmerLists)
            <tr>
                <td class="align-middle">{{$farmerLists->name}}</td>
                <td class="align-middle">{{$farmerLists->age}}</td>
                <td class="align-middle">{{$farmerLists->phone}}</td>
                <td class="align-middle">{{$farmerLists->area}}</td>
                <td class="align-middle">{{$farmerLists->class}}</td>
                <td class="align-middle">{{$farmerLists->PlantingArea}}</td>
                <td class="align-middle">{{$farmerLists->PlantingQuantity}}</td>
                <td class="align-middle">{{$farmerLists->PlantingYear}}</td>
                <td class="align-middle" style="width: 300px; height: auto">{{$farmerLists->result}}</td>
                <td class="align-middle"><img src="{{url('../img/farmer/' . $farmerLists->img)}}" alt="Smiley face" height="100" width="100"></td>
                <td class="align-middle">
                    <a href="{{route('show.farmer.updateForm',$farmerLists->id)}}" class="btn btn-success" style="display: inline-block">修改</a>
                    <form class="delete" action="{{route('destroy.farmer',$farmerLists->id)}}" method="POST"
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
</div>
<script type="text/javascript">
    function ConfirmDelete() {
        var x = confirm("你確定要刪除此菇農資料嗎?");
        if (x)
            return true;
        else
            return false;
    }

    var createButton = document.getElementById('createButton');
    createButton.addEventListener('click', function (e) {
        var age = document.getElementById('age');
        var phone = document.getElementById('phone');
        if (isNaN(age.value)) {
            e.preventDefault();
            alert("年齡必須為數字");
        }
        if (isNaN(phone.value)) {
            e.preventDefault();
            alert("連絡電話必須為數字");
        }
    });
</script>
@endsection