<?php

namespace App\Http\Controllers;

use App\Category;
use App\Menu;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productList = Product::all();
        return view('product.list', compact('productList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $CategoryList = Category::all();
        $product = Product::all();
        return view('Backstage.product.create', compact('CategoryList', 'product'));
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
            $request->file('img')->move(public_path("/img/product"), $file_name);
            // save new image $file_name to database
            // $product->update(['picture' => $file_name]);
            Product::create([
                'category_id' => $request['category'],
                'name' => $request['name'],
                'price' => $request['price'],
                'size' => $request['size'],
                'img' => $file_name,
                'inventory' => $request['inventory'],
                'introduction' => $request['introduction'],
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
        $updateProduct = Product::all()->where('id', $id);
        $categoryList = Category::all();
        return view('Backstage.product.update', compact('updateProduct', 'categoryList'));
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
        $fileName = Product::all()->where('id', $id)->pluck('img');
        $image_path = public_path("\img\product\\") . $fileName[0];
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        if ($request->hasFile('img')) {
            //取得檔案名稱
            $file_name = time() . '.' . $request['img']->getClientOriginalExtension();
            $file_name2 = $file_name;
            $request->file('img')->move(public_path("/img/product"), $file_name2);
            DB::table('product')->where('id', $id)->update([
                'category_id' => $request['category'],
                'name' => $request['name'],
                'price' => $request['price'],
                'size' => $request['size'],
                'img' => $file_name2,
                'inventory' => $request['inventory'],
                'introduction' => $request['introduction'],
            ]);
        }
        return redirect()->Route('show.product.form');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fileName = Product::all()->where('id', $id)->pluck('img');
        $image_path = public_path("\img\product\\") . $fileName[0];
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        DB::table('product')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function detail($id)
    {
        $productDetail = Product::all()->where('id', $id);
        return view('product.detail',compact('productDetail'));
    }
}
