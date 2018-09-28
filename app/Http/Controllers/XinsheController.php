<?php

namespace App\Http\Controllers;

use App\Xinshe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class XinsheController extends Controller
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
        $XinsheList = Xinshe::all();
        return view('Backstage.xinshe.create',compact('XinsheList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('img')) {
            //取得檔案名稱
            $file_name = time() . '.' . $request['img']->getClientOriginalExtension();
            $request->file('img')->move(public_path("/img/Xinshe"), $file_name);
            Xinshe::create([
                'title' => $request['title'],
                'AboutXinshe' => $request['AboutXinshe'],
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
        $updateXinshe = Xinshe::all()->where('id',$id);
        return view('Backstage.xinshe.update',compact('updateXinshe'));
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
        $fileName = Xinshe::all()->where('id', $id)->pluck('img');
        $image_path = public_path("\img\Xinshe\\") . $fileName[0];
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        if ($request->hasFile('img')) {
            //取得檔案名稱
            $file_name = time() . '.' . $request['img']->getClientOriginalExtension();
            $file_name2 = $file_name;
            $request->file('img')->move(public_path("/img/Xinshe"), $file_name2);
            DB::table('xinshe')->where('id', $id)->update([
                'title' => $request['title'],
                'AboutXinshe' => $request['AboutXinshe'],
                'img' => $file_name2,
            ]);
        }
        return redirect()->route('show.xinshe.form');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fileName = Xinshe::all()->where('id', $id)->pluck('img');
        $image_path = public_path("\img\Xinshe\\") . $fileName[0];
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        DB::table('xinshe')->where('id', $id)->delete();
        return redirect()->back();
    }
}
