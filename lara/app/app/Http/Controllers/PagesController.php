<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Page;
use App\Models\Categorie;
use App\Models\Post;
use App\Models\Trend;
use App\Models\Technologie;
use App\Models\User;
use Illuminate\Http\{Request, Response};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class PagesController extends Controller
{
//display ALL sections
    public function index()
    {
        //site section as 'about us', 'trends' etc

        $sections = Page::orderBy('section_order', 'asc')->pluck('name', 'link')->toArray();
        //main product categories 'encastre interieurs' etc
        $types = Categorie::where('parent_cat_id', '0')->orderBy('cat_order', 'asc')->pluck('cat_name', 'id')->toArray();
        $news = Post::get(['name', 'content', 'id'])->toArray();
        $footer = Page::get(['name', 'description', 'link'])->toArray();
        $products = Product::where('categorie_id', '97')->get(['name', 'id', 'description', 'image'])->toArray();

        //dd($sections);
        return view('layouts.default.default')->with([
            'sections' => $sections,
            'types' => $types,
            'footer' => $footer,
            'news' => $news,
            'products' => $products,
        ]);

    }

//form for creating page
    public function create()
    {
//
    }

//store page
    public function store(Request $request)
    {
//
    }

//show 1 section
    public function show($id)
    {
        $id = 'pages/' . $id;
        $sections = Page::all()->pluck('name', 'link')->toArray();
        $content = Page::where('link', $id)->pluck('content', 'name')->toArray();
        $types = Categorie::all()->where('parent_cat_id', '0')->pluck('cat_name')->toArray();
        $footer = Page::get(['name', 'description', 'link'])->toArray();

        return view('layouts.default.section')->with([
            'content' => $content,
            'sections' => $sections,
            'types' => $types,
            'footer' => $footer,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//
    }


    public function searchall(Request $request)
    {
    
        // $query = urlencode($request->input('query'));
        //  $site = 'idistance.school';
        //  $url = 'http://www.google.com/search?q=3A'.$site.'+'.$query;
        //  $result = file_get_contents($url);
        // dd($result);
        
         $query = urlencode($request->input('query'));
         $results = Product::where('name','LIKE', '%'.$query.'%')
                    ->orWhere('description','LIKE', '%'.$query.'%')
                    ->orWhere('content','LIKE', '%'.$query.'%')
                    ->get();
        


        $sections = Page::all()->pluck('name', 'link')->toArray();
        $types = Categorie::all()->where('parent_cat_id', '0')->pluck('cat_name')->toArray();
        $footer = Page::get(['name', 'description', 'link'])->toArray();
        $news = Post::all()->pluck('name', 'content')->toArray();
        $users = User::where('role', 'admin')->get(['avatar', 'name', 'first_name',])->toArray();
        
        return view('layouts.default.search')->with([
            'news' => $news,
            'sections' => $sections,
            'types' => $types,
            'footer' => $footer,
            'users' => $users,
            'results' => $results,
            'query' => $query,
        ]);

    }


    public function links()
    {
//        DB::update('UPDATE categories SET image = replace(image, ?, ?) ',
//            [
//                'images', 'img'
//            ]
//
//        );
    }
}
