<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FooterController extends Controller
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
        $footerList = DB::table('footer')->get();
        return view('Backstage.footer.create',compact('footerList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('footer')->insert([
            'phone' => $request['phone'],
            'address' => $request['address'],
            'ProductionYear' => $request['ProductionYear'],
            'AssistingUnit' => $request['AssistingUnit'],
            'ProvidingUnit' => $request['ProvidingUnit'],
        ]);
        return redirect()->route('show.footer.form');
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
        $updateFooter = DB::table('footer')->where('id',$id)->get();

        return view('Backstage.footer.update',compact('updateFooter'));
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
        DB::table('footer')->where('id',$id)->update([
            'phone' => $request['phone'],
            'address' => $request['address'],
            'ProductionYear' => $request['ProductionYear'],
            'AssistingUnit' => $request['AssistingUnit'],
            'ProvidingUnit' => $request['ProvidingUnit'],
        ]);

        return redirect()->route('show.footer.form');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('footer')->where('id',$id)->delete();

        return redirect()->route('show.footer.form');
    }
}
