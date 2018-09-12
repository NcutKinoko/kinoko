<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Product;

use App\Step;
use Illuminate\Http\Request;

class MenuController extends Controller
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
        $productList = Product::all();
        $menuList = Menu::all();
        $stepList = Step::all();
        return view('Backstage.menu.create', compact( 'productList','menuList','stepList'));
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
            $request->file('img')->move(public_path("/img/menu"), $file_name);
            // save new image $file_name to database
            // $product->update(['picture' => $file_name]);
            Menu::create([
                'product_id' => $request['product'],
                'sauce' => $request['sauce'],
                'name' => $request['name'],
                'seasoning' => $request['seasoning'],
                'material' => $request['material'],
                'img' => $file_name,
                'remark' => $request['remark']
            ]);
        }
//        $productID = Product::all()->last()->plurk('id');
//        Step::create([
//            'menu_id' => $productID
//        ]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
