<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div>
    @foreach($updateList as $updateLists)
        <form action="{{route('update.farmer',$updateLists->id)}}" method="POST" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label>姓名</label>
                <input name="name" class="form-control" placeholder="請輸入姓名" value="{{$updateLists->name}}" required>
            </div>
            <div class="form-group">
                <label>年齡</label>
                <input name="age" id="age" class="form-control" value="{{$updateLists->age}}" placeholder="請輸入年齡">歲
            </div>
            <div class="form-group">
                <label>連絡電話</label>
                <input name="phone" id="phone" class="form-control" value="{{$updateLists->phone}}" placeholder="請輸入電話號碼" required>
            </div>
            <div class="form-group">
                <label>農業經營專區</label>
                <input name="area" class="form-control" value="{{$updateLists->area}}" placeholder="請輸入農業經營專區" required>
            </div>
            <div class="form-group">
                <label>班別</label>
                <input name="class" class="form-control" value="{{$updateLists->class}}" placeholder="請輸入班別" required>
            </div>
            <div class="form-group">
                <label>種植面積</label>
                <input name="PlantingArea" class="form-control" value="{{$updateLists->PlantingArea}}" placeholder="請輸入種植面積" required>
            </div>
            <div class="form-group">
                <label>栽種包數</label>
                <input name="PlantingQuantity" class="form-control" value="{{$updateLists->PlantingQuantity}}" placeholder="請輸入栽種包數" required>
            </div>
            <div class="form-group">
                <label>栽種年資</label>
                <input name="PlantingYear" class="form-control" value="{{$updateLists->PlantingYear}}" placeholder="請輸入栽種年資" required>
            </div>
            <div class="form-group">
                <label>經營現況與成果</label>
                <textarea name="result" class="form-control" placeholder="請輸入經營現況與成果">{{$updateLists->result}}</textarea>
            </div>
            <div class="form-group">
                <label>上傳菇農照片</label>
                <input type="file" class="form-control" name="img" value="{{old('img')}}" placeholder="上傳圖片" required>
            </div>
            <div class="text-left">
                <button type="submit" id="updateButton" class="btn btn-success">修改</button>
            </div>
        </form>
    @endforeach
</div>
<script type="text/javascript">
    var createButton = document.getElementById('updateButton');
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
</body>