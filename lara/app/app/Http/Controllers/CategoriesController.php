<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class CategoriesController extends Controller
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


    public function show($id)
    {
        $sections = Page::all()->pluck('name', 'link')->toArray();
        $types = Categorie::all()->where('parent_cat_id', '0')->pluck('cat_name', 'id')->toArray();
        $footer = Page::get(['name', 'description', 'link'])->toArray();
        $subcats = Categorie::where('parent_cat_id', $id)->get(['cat_name',  'image', 'parent_cat_id', 'id', ])->toArray();
        $header = Categorie::where('id', $id)->pluck('cat_name', 'id')->toArray();
        $products = Product::where('categorie_id', $id)->get()->toArray();
        return view('layouts.default.catsubmenu')->with([
            'subcats'=>$subcats,
            'sections'=>$sections,
            'types' => $types,
            'footer' => $footer,
            'header' => $header,
            'products' => $products,
        ]);

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

    public function select($id){
        $sections = Page::all()->pluck('name', 'link')->toArray();
        $types = Categorie::all()->where('parent_cat_id', '0')->pluck('cat_name', 'id')->toArray();
        $footer = Page::get(['name', 'description', 'link'])->toArray();
        $subcats = Categorie::where('parent_cat_id', $id)->get(['cat_name',  'image', 'parent_cat_id', 'id', ])->toArray();
        $header = Categorie::where('id', $id)->pluck('cat_name', 'id')->toArray();
        $products = Product::where('categorie_id', $id)->get(['name', 'id', 'description', 'image'])->toArray();
        return view('layouts.default.catsubmenu')->with([
            'products' => $products,
            'subcats'=>$subcats,
            'sections'=>$sections,
            'types' => $types,
            'footer' => $footer,
            'header' => $header,
//
        ]);
    }

}
