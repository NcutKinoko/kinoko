<?php

namespace App\Http\Controllers;

use App\ProductionProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductionProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ProductionProcessList = DB::table('productionprocess')->get();
        $FooterList = DB::table('footer')->get();
        $OutSiteLink = DB::table('outsitelink')->get();
        return view('product-process.product-process',compact('ProductionProcessList','FooterList','OutSiteLink'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ProductionProcess = ProductionProcess::all();
        return view('Backstage.ProductionProcess.create',compact('ProductionProcess'));
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
            $request->file('img')->move(public_path("/img/ProductionProcess"), $file_name);
            ProductionProcess::create([
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
        $updateProductionProcess = ProductionProcess::all()->where('id',$id);
        return view('Backstage.ProductionProcess.update',compact('updateProductionProcess'));
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
        $fileName = ProductionProcess::all()->where('id', $id)->pluck('img');
        $image_path = public_path("\img\ProductionProcess\\") . $fileName[0];
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        if ($request->hasFile('img')) {
            //取得檔案名稱
            $file_name = time() . '.' . $request['img']->getClientOriginalExtension();
            $file_name2 = $file_name;
            $request->file('img')->move(public_path("/img/ProductionProcess"), $file_name2);
            DB::table('ProductionProcess')->where('id', $id)->update([
                'img' => $file_name2,
            ]);
        }
        return redirect()->route('show.process.form');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fileName = ProductionProcess::all()->where('id', $id)->pluck('img');
        $image_path = public_path("\img\ProductionProcess\\") . $fileName[0];
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        DB::table('ProductionProcess')->where('id', $id)->delete();
        return redirect()->back();
    }
}
