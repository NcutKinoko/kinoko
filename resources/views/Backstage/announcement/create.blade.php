@extends('Backstage.layouts.master')

@section('title', 'HOME')

@section('content')
    <div class="container-fluid">
        <h1 style="text-align: center">公告</h1>
        <form action="{{route('store.announcement')}}" method="POST" role="form" enctype="multipart/form-data" style="margin-bottom: 16px">
            {{ csrf_field() }}
            <div class="form-group">
                <label>標題：</label>
                <input name="title" class="form-control" placeholder="請輸入標題" required>
            </div>
            <div class="form-group">
                <label>公告類別：</label>
                <select name="announcement_category_id" class="form-control" required>
                    <option value="" disabled="disabled" selected="selected">請選擇公告類別</option>
                    @foreach($AnnouncementCategoryList as $AnnouncementCategoryLists)
                        <option value={{$AnnouncementCategoryLists->id}}>{{$AnnouncementCategoryLists->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>內文：</label>
                <textarea name="content" class="form-control" placeholder="請輸入內文"></textarea>
            </div>
            <div class="form-group">
                <label>上傳公告圖片：</label>
                <input type="file" class="form-control" name="img" value="{{old('img')}}" placeholder="上傳圖片">
            </div>
            <div class="text-left">
                <button type="submit" class="btn btn-success" id="createButton">新增</button>
            </div>
        </form>

        <form action="{{route('search.announcement')}}" method="POST" class="card card-sm" style="margin-bottom: 16px;">
            {{ csrf_field() }}
            <div class="card-body row no-gutters align-items-center">
                <!--end of col-->
                <div class="col">
                    <input class="form-control form-control-lg form-control-borderless" name="search" type="search"
                           placeholder="搜尋公告名稱" required>
                </div>
                <!--end of col-->
                <div class="col-auto">
                    <button class="btn btn-lg btn-success" type="submit">搜尋</button>
                </div>
                <!--end of col-->
            </div>
        </form>

        <table class="table" id="categoryTable">
            <thead>
            <tr>
                <th scope="col">標題</th>
                <th scope="col">公告類別</th>
                <th scope="col">內文</th>
                <th scope="col">圖片</th>
                <th scope="col">修改/刪除</th>
            </tr>
            </thead>
            <tbody>
            @foreach($Announcement as $Announcements)
                <tr>
                    <td class="align-middle">{{$Announcements->title}}</td>
                    <td class="align-middle">{{$Announcements->AnnouncementCategoryName}}</td>
                    <td class="align-middle">{{$Announcements->content}}</td>
                    <td class="align-middle"><img src="{{url('../img/announcement/' . $Announcements->img)}}" alt="此公告沒圖片" height="100" width="100"></td>
                    <td class="align-middle">
                        <a href="{{route('show.announcement.updateForm',$Announcements->id)}}" class="btn btn-success" style="display: inline-block">修改</a>
                        <form class="delete" action="{{route('destroy.announcement',$Announcements->id)}}" method="POST" onsubmit="return ConfirmDelete()" style="display: inline-block; margin: 0;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="submit" class="btn btn-danger" value="刪除">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <script>
            function ConfirmDelete()
            {
                var x = confirm("你確定要刪除此公告嗎?");
                if (x)
                    return true;
                else
                    return false;
            }
        </script>
    </div>
@endsection