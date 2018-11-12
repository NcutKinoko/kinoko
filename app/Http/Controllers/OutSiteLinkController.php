<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OutSiteLinkController extends Controller
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
        $OutSiteLink = DB::table('outsitelink')->get();

        return view('Backstage.OutSiteLink.create',compact('OutSiteLink'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('outsitelink')->insert([
            'Facebook' => $request['Facebook'],
            'Youtube' => $request['Youtube'],
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
        $UpdateOutSiteLink = DB::table('outsitelink')->where('id',$id)->get();

        return view('Backstage.OutSiteLink.update',compact('UpdateOutSiteLink'));
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
        DB::table('outsitelink')->where('id',$id)
            ->update([
               'Facebook' =>  $request['Facebook'],
                'Youtube' =>  $request['Youtube'],
            ]);

        return redirect()->route('show.OutSiteLink.form');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('outsitelink')->where('id',$id)->delete();

        return redirect()->back();
    }
}
