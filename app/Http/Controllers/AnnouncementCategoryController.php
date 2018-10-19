<?php

namespace App\Http\Controllers;

use App\AnnouncementCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnnouncementCategoryController extends Controller
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
        $announcementCategoryList =  AnnouncementCategory::all();
        return view('Backstage.announcement_category.create',compact('announcementCategoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AnnouncementCategory::create([
            'name' => $request->input('name')
        ]);
        $category = AnnouncementCategory::all()->last();
        $sen['success'] = true;
        $sen['result'] = $category['name'];
        $sen['id'] = $category['id'];
        return response($sen);
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
        $update = AnnouncementCategory::all()->find($request['id']);
        $update->update([
            'name' => $request['content']
        ]);
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
        $category = AnnouncementCategory::find($request->input('id'));
        $category->delete();
        DB::table('announcement')->where('announcement_category_id', $request['id'])->update(['announcement_category_id' => 0]);
        $sen['id'] = $request['id'];
        return response($sen);
    }
}
