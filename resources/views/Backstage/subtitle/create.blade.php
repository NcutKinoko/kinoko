<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
<form action="{{route('store.subtitle')}}" id="createSubtitle" method="POST" role="form"
      enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label>副標題</label>
        <input id="name" name="name" class="form-control" placeholder="請輸入副標題" required>
    </div>
    <div class="form-group">
        <label>所屬活動</label>
        <select name="activity_id" class="form-control" required>
            <option value="" disabled="disabled" selected="selected">請選擇活動</option>
            @foreach($activityList as $activityLists)
                <option value={{$activityLists->id}}>{{$activityLists->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="text-left">
        <button type="submit" class="create btn btn-success" id="createButton">新增</button>
    </div>
</form>
<table class="table">
    <thead>
    <tr>
        <th scope="col">編號</th>
        <th scope="col">副標題</th>
        <th scope="col">所屬活動</th>
    </tr>
    </thead>
    <tbody>
    @foreach($subtitleList as $subtitleLists)
        <tr>
            <th scope="row">{{$subtitleLists->id}}</th>
            <td>{{$subtitleLists->subtitleName}}</td>
            <td>{{$subtitleLists->activityName}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>