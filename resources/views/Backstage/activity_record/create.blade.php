<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
<form action="{{route('store.activity_record')}}" id="createActivityRecord" method="POST" role="form"
      enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label>標題</label>
        <input id="name" name="name" class="form-control" placeholder="請輸入標題" required>
    </div>
    <div class="form-group">
        <label>所屬副標題</label>
        <select name="subtitle_id" class="form-control" required>
            <option value="" disabled="disabled" selected="selected">請選擇副標題</option>
            @foreach($subtitleList as $subtitleLists)
                <option value={{$subtitleLists->id}}>{{$subtitleLists->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>圖片</label>
        <input type="file" id="img" name="img" class="form-control" placeholder="請輸選擇圖片" required>
    </div>
    <div class="text-left">
        <button type="submit" class="create btn btn-success" id="createButton">新增</button>
    </div>
</form>
<table class="table">
    <thead>
    <tr>
        <th scope="col">編號</th>
        <th scope="col">標題</th>
        <th scope="col">所屬副標題</th>
        <th scope="col">圖片</th>
    </tr>
    </thead>
    <tbody>
    @foreach($activity_record as $activity_records)
    <tr>
        <th class="align-middle" scope="row">{{$activity_records->id}}</th>
        <td class="align-middle">{{$activity_records->activity_recordName}}</td>
        <td class="align-middle">{{$activity_records->subtitleName}}</td>
        <td class="align-middle"><img src="{{url('../img/activity_record/' . $activity_records->img)}}" alt="Smiley face" height="100" width="100"></td>
    </tr>
    @endforeach
    </tbody>
</table>
</body>