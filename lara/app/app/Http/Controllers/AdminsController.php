<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = 'Dashboard';
        $sections = Admin::get(['icon', 'link', 'leftsection'])->toArray();
        $slot = 'dash';
        return view('admin.welcome')->with([
            'header' => $header,
            'sections' => $sections,

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
        $header = ucfirst($id);
        $sections = Admin::get(['icon', 'link', 'leftsection'])->toArray();
        $items = Product::get(['id', 'name', 'description', 'image', 'created_at', 'categorie_id'])->toArray();
        $paginator = Product::paginate(20);
        //Admin::all()->pluck('leftsection', 'link')->toArray();
        return view("admin.pages.$id")->with([
            'header' => $header,
            'sections' => $sections,
            'items' =>  $items,
            'paginator' =>$paginator,
        ]);
        //return 'hi';
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
