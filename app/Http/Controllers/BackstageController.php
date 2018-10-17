<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
