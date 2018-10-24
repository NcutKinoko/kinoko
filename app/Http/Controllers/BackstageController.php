<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BackstageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth:backstage');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('BackstageHome');
    }

    public function ShowIndex()
    {
        return view('Backstage.index.index');
    }

    public function ShowManagement()
    {
        $LevelList = DB::table('level')->get();
        $AuthList = DB::table('backstage_users')
            ->leftJoin('level','backstage_users.level_id','level.id')
            ->select('backstage_users.id','backstage_users.account','backstage_users.name as UserName','backstage_users.email',DB::raw('(CASE WHEN backstage_users.IsCancel = "0" THEN "未開啟" ELSE "已開啟" END) as IsCancel'),'level_id','level.name as LevelName')
            ->where('backstage_users.id','!=', Auth::guard('backstage')->user()->id)
            ->get();
        return view('Backstage.AuthManagement.AuthManagement',compact('AuthList','LevelList'));
    }

    public function open($id)
    {
        DB::table('backstage_users')->where('id',$id)->update(['IsCancel' => 1]);
        return redirect()->back();
    }

    public function close($id)
    {
        DB::table('backstage_users')->where('id',$id)->update(['IsCancel' => 0]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        DB::table('backstage_users')->where('id',$id)->delete();
        return redirect()->back();
    }

    public function update(Request $request,$id)
    {
        DB::table('backstage_users')->where('id',$id)->update(['level_id' => $request['level']]);
        return redirect()->back();
    }
}