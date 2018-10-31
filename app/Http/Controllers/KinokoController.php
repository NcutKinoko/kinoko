<?php

namespace App\Http\Controllers;

use App\Kinoko;
use App\RatingDescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KinokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $KinokoStandard = DB::table('kinoko_standard')->get();
        $RatingDescription = DB::table('ratingdescription')->get();
        return view('kinoko-standard.kinoko-standard',compact('KinokoStandard','RatingDescription'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $KinokoList = Kinoko::all();
        $KinokoContent = RatingDescription::all();
        return view('Backstage.kinoko-standard.create', compact('KinokoList', 'KinokoContent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kinoko::create([
            'item' => $request['item'],
            'distribution' => $request['distribution'],
            'TestMethod' => $request['TestMethod'],
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $updateKinoko = Kinoko::all()->where('id',$id);
        return view('Backstage.kinoko-standard.update',compact('updateKinoko'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('kinoko_standard')->where('id', $id)->update([
            'item' => $request['item'],
            'distribution' => $request['distribution'],
            'TestMethod' => $request['TestMethod'],
        ]);
        return redirect()->route('show.kinoko.form');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('kinoko_standard')->where('id' , $id)->delete();
        DB::table('ratingdescription')->where('KinokoStandard_id' , $id)->delete();
        return redirect()->back();
    }
}
