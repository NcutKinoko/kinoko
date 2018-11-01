<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\AnnouncementCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $AnnouncementCategoryList = AnnouncementCategory::all();
        $Announcement = DB::table('announcement')
            ->leftJoin('announcementcategory','announcement.announcement_category_id','=','announcementcategory.id')
            ->select('announcement.id','announcement.title',DB::raw('(CASE WHEN announcement.announcement_category_id = "0" THEN "此公告未分類" ELSE announcementcategory.name END) AS AnnouncementCategoryName'),'announcement.content','announcement.img')
            ->get();
        return view('Backstage.announcement.create',compact('Announcement','AnnouncementCategoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //如果有檔案才做存入
        if ($request->hasFile('img')) {
            //取得檔案名稱
            $file_name = time() . '.' . $request['img']->getClientOriginalExtension();
            $request->file('img')->move(public_path("/img/announcement"), $file_name);
            Announcement::create([
                'title' => $request['title'],
                'announcement_category_id' => $request['announcement_category_id'],
                'content' => $request['content'],
                'img' => $file_name,
            ]);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $updateAnnouncement = Announcement::all()->where('id',$id);
        $AnnouncementCategoryList = AnnouncementCategory::all();
        return view('Backstage.announcement.update',compact('updateAnnouncement','AnnouncementCategoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fileName = Announcement::all()->where('id', $id)->pluck('img');
        $image_path = public_path("\img\announcement\\") . $fileName[0];
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        if ($request->hasFile('img')) {
            //取得檔案名稱
            $file_name = time() . '.' . $request['img']->getClientOriginalExtension();
            $file_name2 = $file_name;
            $request->file('img')->move(public_path("/img/announcement"), $file_name2);
            DB::table('announcement')->where('id', $id)->update([
                'title' => $request['title'],
                'announcement_category_id' => $request['announcement_category_id'],
                'content' => $request['content'],
                'img' => $file_name2,
            ]);
        }
        return redirect()->Route('show.announcement.form');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fileName = Announcement::all()->where('id', $id)->pluck('img');
        $image_path = public_path("\img\announcement\\") . $fileName[0];
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        DB::table('announcement')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $AnnouncementCategoryList = AnnouncementCategory::all();
        $Announcement = DB::table('announcement')
            ->leftJoin('announcementcategory','announcement.announcement_category_id','=','announcementcategory.id')
            ->select('announcement.id','announcement.title',DB::raw('(CASE WHEN announcement.announcement_category_id = "0" THEN "此公告未分類" ELSE announcementcategory.name END) AS AnnouncementCategoryName'),'announcement.content','announcement.img')
            ->where('announcement.title','like',"%{$request['search']}%")
            ->get();
        return view('Backstage.announcement.create',compact('Announcement','AnnouncementCategoryList'));
    }
}