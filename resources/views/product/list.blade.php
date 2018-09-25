<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="{{asset('css/Product-List.css')}}" rel="stylesheet">
    <script src="{{asset('js/Product-List.js')}}"></script>
</head>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="well well-sm">
        <strong>Category Title</strong>
        <div class="btn-group">
            <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
            </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                        class="glyphicon glyphicon-th"></span>Grid</a>
        </div>
    </div>
    @foreach($productList as $productLists)
    <div id="products" class="row list-group">
        <div class="item  col-xs-4 col-lg-4">
            <div class="thumbnail">
                <img class="group list-group-image" src="{{url('../img/product/' . $productLists->img)}}" alt="此商品尚未有圖片" />
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">
                        <a href="{{}}" style="text-decoration: none; color: #000;">{{$productLists->name}}</a></h4>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <p class="lead">
                                本店售價:{{$productLists->price}}</p>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <a class="btn btn-success" href="http://www.jquery2dotnet.com">加入購物車</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @endforeach
</div>