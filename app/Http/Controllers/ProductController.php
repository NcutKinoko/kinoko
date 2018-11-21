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
        $categoryList = DB::table('category')->get();
        $FooterList = DB::table('footer')->get();
        $OutSiteLink = DB::table('outsitelink')->get();
        $CountResult = DB::table('countview')->get();
        return view('product.list', compact('productList', 'categoryList','FooterList','OutSiteLink','CountResult'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $CategoryList = Category::all();
        $product = DB::table('product')
            ->leftJoin('category', 'product.category_id', '=', 'category.id')
            ->select('product.id', 'product.name', DB::raw('(CASE WHEN product.category_id = "0" THEN "此產品未分類" ELSE category.name END) AS categoryName'), 'product.price', 'product.inventory', 'product.size', 'product.introduction', 'product.img')
            ->get();
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
        return redirect()->route('show.product.form');
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
        if ($request->hasFile('img')) {
            $fileName = Product::all()->where('id', $id)->pluck('img');
            $image_path = public_path("\img\product\\") . $fileName[0];
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
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
        }else{
            DB::table('product')->where('id', $id)->update([
                'category_id' => $request['category'],
                'name' => $request['name'],
                'price' => $request['price'],
                'size' => $request['size'],
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
        DB::table('menu')->where('product_id', $id)->update([
            'product_id' => 0
        ]);
        return redirect()->route('show.product.form');
    }

    public function detail($id)
    {
        $productDetail = DB::table('product')
            ->leftJoin('category', 'product.category_id', 'category.id')
            ->select('product.id', 'product.name as productName', DB::raw('(CASE WHEN product.category_id = "0" THEN "此產品未分類" ELSE category.name END) AS categoryName'), 'product.price', 'product.inventory', 'product.size', 'product.introduction', 'product.img')
            ->where('product.id', $id)
            ->get();
        $FooterList = DB::table('footer')->get();
        $OutSiteLink = DB::table('outsitelink')->get();
        $CountResult = DB::table('countview')->get();
        return view('product.detail', compact('productDetail','FooterList','OutSiteLink','CountResult'));
    }

    public function search(Request $request)
    {
        $CategoryList = DB::table('category')->get();
        $product = DB::table('product')
            ->leftJoin('category', 'product.category_id', '=', 'category.id')
            ->select('product.id', 'product.name', DB::raw('(CASE WHEN product.category_id = "0" THEN "此產品未分類" ELSE category.name END) AS categoryName'), 'product.price', 'product.inventory', 'product.size', 'product.introduction', 'product.img')
            ->where("product.name", "like", "%{$request['search']}%")
            ->get();
        return view('Backstage.product.create', compact('product', 'CategoryList'));
    }

    public function category($id)
    {
        $categoryList = DB::table('category')->get();
        $productList = DB::table('product')->where('category_id', $id)->get();
        $FooterList = DB::table('footer')->get();
        $OutSiteLink = DB::table('outsitelink')->get();
        $CountResult = DB::table('countview')->get();
        return view('product.list', compact('productList', 'categoryList','FooterList','OutSiteLink','CountResult'));
    }
}
