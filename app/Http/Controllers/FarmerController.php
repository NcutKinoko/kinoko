<?php

namespace App\Http\Controllers;

use App\Farmer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class FarmerController extends Controller
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
        $farmerList = Farmer::all();
        return view('Backstage.farmer.create', compact('farmerList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //如果有檔案才做存入
        if ($request->hasFile('img')) {
            //取得檔案名稱
            $file_name = time() . '.' . $request['img']->getClientOriginalExtension();
            $request->file('img')->move(public_path("/img/farmer"), $file_name);
            Farmer::create([
                'name' => $request['name'],
                'age' => $request['age'],
                'phone' => $request['phone'],
                'area' => $request['area'],
                'class' => $request['class'],
                'PlantingArea' => $request['PlantingArea'],
                'PlantingQuantity' => $request['PlantingQuantity'],
                'PlantingYear' => $request['PlantingYear'],
                'result' => $request['result'],
                'img' => $file_name,
            ]);
        }
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
        $updateList = Farmer::all()->where('id',$id);
        return view('Backstage.farmer.update',compact('updateList'));
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
        $fileName = Farmer::all()->where('id', $id)->pluck('img');
        $image_path = public_path("\img\\farmer\\") . $fileName[0];
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        if ($request->hasFile('img')) {
            //取得檔案名稱
            $file_name = time() . '.' . $request['img']->getClientOriginalExtension();
            $file_name2 = $file_name;
            $request->file('img')->move(public_path("/img/farmer"), $file_name2);
            DB::table('farmer')->where('id', $id)->update([
                'name' => $request['name'],
                'age' => $request['age'],
                'phone' => $request['phone'],
                'area' => $request['area'],
                'class' => $request['class'],
                'PlantingArea' => $request['PlantingArea'],
                'PlantingQuantity' => $request['PlantingQuantity'],
                'PlantingYear' => $request['PlantingYear'],
                'result' => $request['result'],
                'img' => $file_name2,
            ]);
        }
        return redirect()->route('show.farmer.form');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fileName = Farmer::all()->where('id', $id)->pluck('img');
        $image_path = public_path("\img\\farmer\\") . $fileName[0];
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        DB::table('farmer')->where('id',$id)->delete();
        return redirect()->back();
    }
}
