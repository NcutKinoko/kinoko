<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <h1 class="">活動名稱</h1>
    <form action="{{route('store.activity')}}" id="createActivity" method="POST" role="form"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>活動名稱</label>
            <input id="name" name="name" class="form-control" placeholder="請輸入活動名稱" required>
        </div>
        <div class="text-left">
            <button type="submit" class="create btn btn-success" id="createButton">新增</button>
        </div>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">編號</th>
            <th scope="col">活動名稱</th>
        </tr>
        </thead>
        <tbody>
        @foreach($activityList as $activityLists)
            <tr>
                <th scope="row">{{$activityLists->id}}</th>
                <td>{{$activityLists->name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>