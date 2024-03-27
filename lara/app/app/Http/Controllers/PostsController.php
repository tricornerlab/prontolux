<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\{Request, Response};
use App\Models\Post;
use App\Models\Product;
use App\Models\Page;
use App\Models\Categorie;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = Post::get(['name', 'content', 'created_at', 'id'])->toArray();
        $sections = Page::all()->pluck('name', 'link')->toArray();
        $content = Page::all()->where('24', 'id')->toArray();
        $types = Categorie::all()->where('parent_cat_id', '0')->pluck('cat_name')->toArray();
        $footer = Page::get(['name', 'description', 'link'])->toArray();
        return view('layouts.default.news')->with([
            'content' => $content,
            'sections' => $sections,
            'types' => $types,
            'footer' => $footer,
            'news' => $news,
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
        $news = Post::all()->where('id', $id)->pluck('content', 'name')->toArray();
        $sections = Page::all()->pluck('name', 'link')->toArray();
        $types = Categorie::all()->where('parent_cat_id', '0')->pluck('cat_name')->toArray();
        $footer = Page::get(['name', 'description', 'link'])->toArray();

        return view('layouts.default.post')->with([
            'news' => $news,
            'id'=>$id,
            'sections' => $sections,
            'types' => $types,
            'footer' => $footer,

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
