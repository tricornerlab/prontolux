<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technologie;
use App\Models\Page;
use App\Models\Categorie;

class TechnologiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {   $header = ['Technologie LED' =>'/technologies',];
        $sections = Page::all()->pluck('name', 'link')->toArray();
        $types = Categorie::all()->where('parent_cat_id', '0')->pluck('cat_name')->toArray();
        $footer = Page::get(['name', 'description', 'link'])->toArray();
        $technologies = Technologie::get(['name', 'content','created_at', 'id', 'image'])->toArray();


        return view('layouts.default.technologies')->with([
            'technologies' => $technologies,
            'sections' => $sections,
            'types' => $types,
            'footer' => $footer,
            'header'=> $header,

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


    public function sortdown()

    {   $header = ['Technologie LED' =>'/technologies',];
        $sections = Page::all()->pluck('name', 'link')->toArray();
        $types = Categorie::all()->where('parent_cat_id', '0')->pluck('cat_name')->toArray();
        $footer = Page::get(['name', 'description', 'link'])->toArray();
        $technologies = Technologie::orderBy('created_at', 'asc')->get(['name', 'content','created_at', 'id', 'image'])->toArray();


        return view('layouts.default.technologies')->with([
            'technologies' => $technologies,
            'sections' => $sections,
            'types' => $types,
            'footer' => $footer,
            'header'=> $header,

        ]);
    }


    public function sortup()

    {   $header = ['Technologie LED' =>'/technologies',];
        $sections = Page::all()->pluck('name', 'link')->toArray();
        $types = Categorie::all()->where('parent_cat_id', '0')->pluck('cat_name')->toArray();
        $footer = Page::get(['name', 'description', 'link'])->toArray();
        $technologies = Technologie::orderBy('created_at', 'desc')->get(['name', 'content','created_at', 'id', 'image'])->toArray();


        return view('layouts.default.technologies')->with([
            'technologies' => $technologies,
            'sections' => $sections,
            'types' => $types,
            'footer' => $footer,
            'header'=> $header,

        ]);
    }
}
