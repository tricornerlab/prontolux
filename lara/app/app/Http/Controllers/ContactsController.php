<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Page::all()->pluck('name', 'link')->toArray();
        $types = Categorie::all()->where('cat_level', '0')->pluck('cat_name', 'id')->toArray();
        $footer = Page::get(['name', 'description', 'link', ])->toArray();
        $header = ['/' => 'Tous les produits',];
        $users = User::where('role', 'admin')->get(['avatar', 'name', 'first_name',])->toArray();

        return view('layouts.default.contactus')->with([
            'users' => $users,
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
    public function create(Request $request)
    {

        $sections = Page::all()->pluck('name', 'link')->toArray();
        $types = Categorie::all()->where('cat_level', '0')->pluck('cat_name', 'id')->toArray();
        $footer = Page::get(['name', 'description', 'link', ])->toArray();
        $header = ['/' => 'Tous les produits',];

        return view('layouts.default.contactus')->with([

            'sections'=>$sections,
            'types' => $types,
            'footer' => $footer,
            'header' => $header,
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
        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'company' => 'max:20',
            'message' => 'required'
        ]);
        //  Store data in database
        Contact::create($request->all());
        //
        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
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
}
