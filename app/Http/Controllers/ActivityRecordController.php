<?php

namespace App\Http\Controllers;

use App\Activity;
use App\ActivityRecord;
use App\Subtitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityRecordController extends Controller
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
        $subtitleList = Subtitle::all();
        $activity_record = DB::table('activity_record')
            ->join('subtitle','activity_record.subtitle_id','=','subtitle.id')
            ->select('activity_record.id','activity_record.name as activity_recordName','subtitle.name as subtitleName','activity_record.img')
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
