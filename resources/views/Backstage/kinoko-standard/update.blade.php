<div>
    @foreach($updateKinoko as $updateKinokos)
        <form action="{{route('update.kinoko',$updateKinokos->id)}}" method="POST" role="form"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label>項目</label>
                <input name="item" class="form-control" placeholder="請輸入項目" value="{{$updateKinokos->item}}"
                       required>
            </div>
            <div class="form-group">
                <label>配分</label>
                <input id="distribution" name="distribution" class="form-control" placeholder="請輸入配分"
                       value="{{$updateKinokos->distribution}}" required>
            </div>
            <div class="form-group">
                <label>測定方法</label>
                <input id="TestMethod" name="TestMethod" class="form-control" placeholder="請輸入測定方法"
                       value="{{$updateKinokos->TestMethod}}" required>
            </div>
            <div class="text-left">
                <button type="submit" class="btn btn-success" id="updateButton">修改</button>
            </div>
        </form>
    @endforeach
    <script>
        var createButton = document.getElementById('updateButton');
        createButton.addEventListener('click', function (e) {
            var distribution = document.getElementById('distribution');
            if (isNaN(distribution.value)) {
                e.preventDefault();
                alert("配分必須為數字");
            }
        });
    </script>
</div>