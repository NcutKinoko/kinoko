<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SlideController extends Controller
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
        $slideList = DB::table('slide')->get();

        return view('Backstage.slide.create',compact('slideList'));
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
            $request->file('img')->move(public_path("/img/slide"), $file_name);
            Slide::create([
                'img' => $file_name,
                'url' => $request['url'],
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
        $updateSlide = DB::table('slide')->where('id',$id)->get();

        return view('Backstage.slide.update',compact('updateSlide'));
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
        if ($request->hasFile('img')) {
            $fileName = Slide::all()->where('id', $id)->pluck('img');
            $image_path = public_path("\img\slide\\") . $fileName[0];
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            //取得檔案名稱
            $file_name = time() . '.' . $request['img']->getClientOriginalExtension();
            $file_name2 = $file_name;
            $request->file('img')->move(public_path("/img/slide"), $file_name2);
            DB::table('slide')->where('id', $id)->update([
                'img' => $file_name2,
                'url' => $request['url'],
            ]);
        }else{
            DB::table('slide')->where('id', $id)->update([
                'url' => $request['url'],
            ]);
        }
        return redirect()->route('show.slide.form');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fileName = Slide::all()->where('id', $id)->pluck('img');
        $image_path = public_path("\img\slide\\") . $fileName[0];
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        DB::table('slide')->where('id', $id)->delete();
        return redirect()->back();
    }
}
