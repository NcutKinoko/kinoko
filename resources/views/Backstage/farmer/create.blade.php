<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div>
    <form action="{{route('store.farmer')}}" method="POST" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>姓名</label>
            <input name="name" class="form-control" placeholder="請輸入姓名" required>
        </div>
        <div class="form-group">
            <label>年齡</label>
            <input name="age" id="age" class="form-control" placeholder="請輸入年齡">歲
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
</div>
<div>

    @foreach($farmerList as $farmerLists)
        <label>姓名:</label><p>{{$farmerLists->name}}</p>
        <label>年齡:</label><p>{{$farmerLists->age}}</p>
        <label>連絡電話:</label><p>{{$farmerLists->phone}}</p>
        <label>農業經營專區:</label><p>{{$farmerLists->area}}</p>
        <label>班別:</label><p>{{$farmerLists->class}}</p>
        <label>種植面積:</label><p>{{$farmerLists->PlantingArea}}</p>
        <label>栽種包數:</label><p>{{$farmerLists->PlantingQuantity}}</p>
        <label>栽種年資:</label><p>{{$farmerLists->PlantingYear}}</p>
        <label>經營現況與成果:</label><p>{{$farmerLists->result}}</p>
        <img src="{{url('../img/farmer/' . $farmerLists->img)}}" alt="Smiley face" height="100" width="100">
        <a href="{{route('show.farmer.updateForm',$farmerLists->id)}}" class="btn btn-success">修改</a>
        <form class="delete" action="{{route('destroy.farmer',$farmerLists->id)}}" method="POST"
              onsubmit="return ConfirmDelete()">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="submit" class="btn btn-danger" value="刪除此評分項目">
        </form>
    @endforeach
</div>
<script type="text/javascript">
    function ConfirmDelete() {
        var x = confirm("你確定要刪除此評分項目內容嗎?");
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
</body>