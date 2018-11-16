<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productList = Product::all();
        $menuList = Menu::all();
        $slideList = DB::table('slide')->get();
        $AnnouncementList = DB::table('announcement')
            ->leftJoin('announcementcategory','announcement.announcement_category_id','=','announcementcategory.id')
            ->select('announcement.id','announcement.title','announcement.content',DB::raw('(CASE WHEN announcement.announcement_category_id = "0" THEN "此公告未分類" ELSE announcementcategory.name END) AS announcementCategoryName'),'announcement.created_at')
            ->take(5)
            ->orderBy('announcement.created_at','desc')
            ->get();
        $FooterList = DB::table('footer')->get();
        $NewProduct = DB::table('product')->take(10)->get();
        $NewMenu = DB::table('menu')->take(10)->get();
        $OutSiteLink = DB::table('outsitelink')->get();
        return view('index.index',compact('productList','menuList','slideList','AnnouncementList','FooterList','NewProduct','NewMenu','OutSiteLink'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
