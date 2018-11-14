<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
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
        return view('Backstage.activity.create',compact('activityList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Activity::create([
            'name' => $request['name'],
        ]);

        return redirect()->route('show.activity.form');
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
    public function update(Request $request)
    {
        $update = Activity::all()->find($request['id']);
        $update->update([
            'name' => $request['content']
        ]);
        $request['success'] = true;
        return Response($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $activity = Activity::find($request->input('id'));
        $activity->delete();
        DB::table('subtitle')->where('activity_id', $request['id'])->update(['activity_id' => 0]);
        $sen['id'] = $request['id'];
        return response($sen);
    }

    public function search(Request $request)
    {
        $activityList = DB::table('activity')->where('name','like',"%{$request['search']}%")->get();
        return view('Backstage.activity.create',compact('activityList'));
    }
}
