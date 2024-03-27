<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Icon;
use App\Models\Table;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\{Request, Response};
use App\Models\Product;
use App\Models\Image;
use App\Models\Page;
use Maatwebsite\Excel\Facades\Excel;


class ProductsController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
    public function index()
    {
    $products = Product::get(['name', 'description', 'image', 'id',])->toArray();
    $sections = Page::all()->pluck('name', 'link')->toArray();
    $types = Categorie::all()->where('cat_level', '0')->pluck('cat_name', 'id')->toArray();
    $footer = Page::get(['name', 'description', 'link', ])->toArray();
    $header = ['/' => 'Tous les produits',];
    return view('layouts.default.products')->with([
    'products'=>$products,
    'sections'=>$sections,
    'types' => $types,
    'footer' => $footer,
    'header' => $header,
    ]);

    }




/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
    public function create()
    {
        $categories = Categorie::all()->pluck('cat_name', 'id')->toArray();
        return view('admin.pages.products.new')->with([
            'categories' => $categories,
        ]);
    }

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
    public function store(Request $request)
    {
    return response ('store');
    }

/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
    public function edit($id)
    {
    return response ('edit');
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
    return response ('update');
    }

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
    public function destroy($id)
    {
    return response ('destroy');
    }



    public function category($cat){
        $products = Product::where('categorie_id', $cat)->get(['name', 'description', 'image'])->toArray();
        $sections = Page::all()->pluck('name', 'link')->toArray();
        $types = Categorie::all()->where('parent_cat_id', '0')->pluck('cat_name')->toArray();
        $footer = Page::get(['name', 'description', 'link'])->toArray();
        return view('layouts.default.products')->with([
            'products'=>$products,
            'sections'=>$sections,
            'types' => $types,
            'footer' => $footer,
        ]);
    }


     public function show($id){
        $next = Product::where('id', '>', $id)->min('id');
        $previous = Product::where('id', '<', $id)->max('id');
        $product = Product::where('id',$id)->get()->toArray();

        $category = $product[0]['categorie_id']; //45
        $sections = Page::all()->pluck('name', 'link')->toArray();
        $types = Categorie::all()->where('parent_cat_id', '0')->pluck('cat_name')->toArray();
        $footer = Page::get(['name', 'description', 'link'])->toArray();
        $categories = Categorie::where('id', $category)->get(['cat_name', 'id', 'parent_cat_id'])->toArray();
        $parentcat = Categorie::where('id',$categories[0]['parent_cat_id'])->pluck('cat_name')->toArray();
        $files = Storage::disk('public')->files("/img/products/$id");
        $icons = Product::where('id', $id)->first()->icons()->get()->toArray();
        $tablesurl = Product::find($id)->tables()->get();

        if(!$tablesurl->isEmpty()){$tableurl = 'storage/'.$tablesurl[0]['url'];}else{$tableurl ='';}

        if(file_exists($tableurl)){
            $table = Excel::toArray([], $tableurl);
        }else{$table = [];}

        $icons= DB::table('icon_product')->where('product_id', $id)
            ->join('icons', function ($join){ $join->on('icons.id', '=', 'icon_product.icon_id');})
            ->orderBy('icon_order')
            ->get(['icon_value', 'icon_url', 'icon_value', 'icon_info'])->toArray();

        return view ('layouts.default.product')->with([
            'product' => $product,
            'sections' => $sections,
            'types' => $types,
            'footer' => $footer,
            'categories' => $categories,
            'category' => $category,
            'parentcat' =>$parentcat,
            'files' => $files,
            'icons' => $icons,
            'table' =>$table,
            'tableurl' => $tableurl,
            'next' => $next,
            'previous' => $previous,

        ]);
    }

}
