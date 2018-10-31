<?php

namespace App\Http\Controllers;

use App\Category;
use App\Menu;
use App\Product;
use App\Step;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $MenuList = DB::table('menu')->get();

        return view('menu.list',compact('MenuList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productList = Product::all();
        $menuList = DB::table('menu')
            ->leftJoin('product','menu.product_id','=','product.id')
            ->select('menu.id','menu.name as menuName',DB::raw('(CASE WHEN menu.product_id = "0" THEN "此菜餚未使用產品" ELSE product.name END) AS productName'),'menu.sauce','menu.seasoning','menu.material','menu.img','menu.remark')
            ->get();
        $stepList = Step::all();
        return view('Backstage.menu.create', compact('productList', 'menuList', 'stepList'));
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
        $updateMenu = Menu::all()->where('id',$id);
        $categoryList = Category::all();
        return view('Backstage.menu.update',compact('updateMenu','categoryList'));
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
        $fileName = Menu::all()->where('id', $id)->pluck('img');
        $image_path = public_path("\img\menu\\") . $fileName[0];
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        if ($request->hasFile('img')) {
            //取得檔案名稱
            $file_name = time() . '.' . $request['img']->getClientOriginalExtension();
            $file_name2 = $file_name;
            $request->file('img')->move(public_path("/img/menu"), $file_name2);
            DB::table('menu')->where('id', $id)->update([
                'product_id' => $request['product'],
                'sauce' => $request['sauce'],
                'name' => $request['name'],
                'seasoning' => $request['seasoning'],
                'material' => $request['material'],
                'img' => $file_name2,
                'remark' => $request['remark']
            ]);
        }
        return redirect()->route('show.menu.form');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fileName = Menu::all()->where('id', $id)->pluck('img');
        $image_path = public_path("\img\menu\\") . $fileName[0];
        $menu = Menu::find($id);
        $menu->delete();
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $whereArray = array('menu_id' => $id);
        DB::table('step')->where($whereArray)->delete();
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $productList = Product::all();
        $menuList = DB::table('menu')
            ->leftJoin('product','menu.product_id','=','product.id')
            ->select('menu.id','menu.name as menuName',DB::raw('(CASE WHEN menu.product_id = "0" THEN "此菜餚未使用產品" ELSE product.name END) AS productName'),'menu.sauce','menu.seasoning','menu.material','menu.img','menu.remark')
            ->where('menu.name','like',"%{$request['search']}%")
            ->get();
        $stepList = Step::all();
        return view('Backstage.menu.create',compact('productList','menuList','stepList'));
    }

    public function detail($id)
    {
        $DetailMenu = DB::table('menu')
            ->leftJoin('product','menu.product_id','=','product.id')
            ->select('menu.id','menu.name as MenuName',DB::raw('(CASE WHEN menu.product_id = "0" THEN "此菜餚未使用產品" ELSE product.name END) AS productName'),'menu.sauce','menu.seasoning','menu.material','menu.img','menu.remark')
            ->where('menu.id',$id)
            ->get();
        $DetailStep = DB::table('step')->where('menu_id',$id)->get();

        return view('menu.detail',compact('DetailMenu','DetailStep'));
    }
}
