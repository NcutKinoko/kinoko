<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Subtitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubtitleController extends Controller
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
        $activityList = Activity::all();
        $subtitleList = DB::table('subtitle')
            ->leftJoin('activity','subtitle.activity_id','=','activity.id')
            ->select('subtitle.id','subtitle.name as subtitleName',DB::raw('(CASE WHEN subtitle.activity_id = "0" THEN "此副標未屬於任何活動" ELSE activity.name END) AS activityName'))
            ->orderBy("subtitle.id")
            ->get();
        return view('Backstage.subtitle.create',compact('activityList','subtitleList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Subtitle::create([
           'name' => $request['name'],
            'activity_id' => $request['activity_id']
        ]);
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
        $updateSubtitle = Subtitle::all()->where('id',$id);
        $activityList = Activity::all();
        return view('Backstage.subtitle.update',compact("updateSubtitle","activityList"));
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
        DB::table('subtitle')->where('id',$id)->update([
           'activity_id' => $request['activity_id'],
            'name' => $request['name'],
        ]);
        return redirect()->route('show.subtitle.form');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('subtitle')->where('id', $id)->delete();
        DB::table('activity_record')->where('subtitle_id',$id)->update(['subtitle_id' => 0]);
        return redirect()->route('show.subtitle.form');
    }

    public function search(Request $request)
    {
        $activityList = Activity::all();
        $subtitleList = DB::table('subtitle')
            ->leftJoin('activity','subtitle.activity_id','=','activity.id')
            ->select('subtitle.id','subtitle.name as subtitleName',DB::raw('(CASE WHEN subtitle.activity_id = "0" THEN "此副標未屬於任何活動" ELSE activity.name END) AS activityName'))
            ->where('subtitle.name','like',"%{$request['search']}%")
            ->orderBy("subtitle.id")
            ->get();
        return view('Backstage.subtitle.create',compact('activityList','subtitleList'));
    }
}
