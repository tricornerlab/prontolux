<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trend;
use App\Models\Page;
use App\Models\Categorie;
use Illuminate\Support\Facades\Storage;


class TrendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trends = Trend::all()->pluck('name', 'id')->toArray();
        $sections = Page::all()->pluck('name', 'link')->toArray();
        $types = Categorie::all()->where('parent_cat_id', '0')->pluck('cat_name')->toArray();
        $footer = Page::get(['name', 'description', 'link'])->toArray();
        return view('layouts.default.trends')->with([
            'trends' => $trends,
            'sections' => $sections,
            'types' => $types,
            'footer' => $footer,
        ]);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trend = Trend::where('id', $id)->get(['content', 'name', 'created_at', 'id'])->toArray();
        $sections = Page::all()->pluck('name', 'link')->toArray();
        $types = Categorie::all()->where('parent_cat_id', '0')->pluck('cat_name')->toArray();
        $footer = Page::get(['name', 'description', 'link'])->toArray();
        $files = Storage::disk('public')->files("/img/trends/$id");
        //echo $files[2];
        //dd($trend);
        return view('layouts.default.item')->with([
            'trend' => $trend,
            'id'=>$id,
            'sections' => $sections,
            'types' => $types,
            'footer' => $footer,
            'files' => $files,
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
}
