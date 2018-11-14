<?php

namespace App\Http\Controllers;

use App\Activity;
use App\ActivityRecord;
use App\Subtitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ActivityRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ActivityList = DB::table('activity')->get();
        $SubtitleList = DB::table('subtitle')->get();
        $ActivityRecordList = DB::table('activity_record')->get();
        $countSubtitle = DB::table('subtitle')
            ->select(DB::raw('count(subtitle.name) as count'),'subtitle.activity_id')
            ->groupBy('subtitle.activity_id')
            ->get();
        $FooterList = DB::table('footer')->get();
        $OutSiteLink = DB::table('outsitelink')->get();
        return view('activity.list',compact('ActivityList','SubtitleList','ActivityRecordList','countSubtitle','FooterList','OutSiteLink'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subtitleList = Subtitle::all();
        $activity_record = DB::table('activity_record')
            ->leftJoin('subtitle','activity_record.subtitle_id','=','subtitle.id')
            ->select('activity_record.id','activity_record.name as activity_recordName',DB::raw('(CASE WHEN activity_record.subtitle_id = "0" THEN "此圖片未有所屬的副標" ELSE subtitle.name END) AS subtitleName'),'activity_record.img')
            ->get();
        return view('Backstage.activity_record.create',compact('subtitleList','activity_record'));
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
            $request->file('img')->move(public_path("/img/activity_record"), $file_name);
            ActivityRecord::create([
                'name' => $request['name'],
                'subtitle_id' => $request['subtitle_id'],
                'img' => $file_name,
            ]);
        }
        return redirect()->route('show.activity_record.form');
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
        $updateActivity_record = ActivityRecord::all()->where('id',$id);
        $subtitleList = Subtitle::all();
        return view('Backstage.activity_record.update',compact("updateActivity_record","subtitleList"));
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
        $fileName = ActivityRecord::all()->where('id', $id)->pluck('img');
        $image_path = public_path("\img\activity_record\\") . $fileName[0];
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        if ($request->hasFile('img')) {
            //取得檔案名稱
            $file_name = time() . '.' . $request['img']->getClientOriginalExtension();
            $file_name2 = $file_name;
            $request->file('img')->move(public_path("/img/activity_record"), $file_name2);
            DB::table('activity_record')->where('id', $id)->update([
                'subtitle_id' => $request['subtitle_id'],
                'name' => $request['name'],
                'img' => $file_name2,
            ]);
        }
        return redirect()->Route('show.activity_record.form');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('activity_record')->where('id',$id)->delete();
        return redirect()->route('show.activity_record.form');
    }

    public function search(Request $request)
    {
        $subtitleList = Subtitle::all();
        $activity_record = DB::table('activity_record')
            ->leftJoin('subtitle','activity_record.subtitle_id','=','subtitle.id')
            ->select('activity_record.id','activity_record.name as activity_recordName',DB::raw('(CASE WHEN activity_record.subtitle_id = "0" THEN "此圖片未有所屬的副標" ELSE subtitle.name END) AS subtitleName'),'activity_record.img')
            ->where('activity_record.name','like',"%{$request['search']}%")
            ->get();
        return view('Backstage.activity_record.create',compact('subtitleList','activity_record'));
    }
}
