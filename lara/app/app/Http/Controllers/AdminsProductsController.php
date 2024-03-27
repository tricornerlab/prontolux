<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Icon;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminsProductsController extends Controller
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
        $header = '';
        $sections = Admin::get(['icon', 'link', 'leftsection'])->toArray();
        $icons = Icon::get(['id', 'icon_info', 'icon_url'])->toArray();
        //$item = Product::where('id',$id)->get(['id', 'name', 'description', 'image', 'created_at', 'categorie_id'])->toArray();
        return view('admin.pages.products.new')->with([
            'header' => $header,
            'sections' => $sections,
            'icons' =>  $icons,
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
        $header = '';
        $sections = Admin::get(['icon', 'link', 'leftsection'])->toArray();
        $item = Product::where('id',$id)->get(['id', 'name', 'description', 'image', 'created_at', 'categorie_id'])->toArray();
        return view('admin.pages.products.card')->with([
            'header' => $header,
            'sections' => $sections,
            'item' =>  $item,

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
        $header = '';
        $sections = Admin::get(['icon', 'link', 'leftsection'])->toArray();
        $item = Product::where('id',$id)->get(['id', 'name', 'description', 'image', 'created_at', 'categorie_id'])->toArray();
        return view('admin.pages.products.edit')->with([
            'header' => $header,
            'sections' => $sections,
            'item' =>  $item,
        ]);

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
