<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Table;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{

    public function renamephotos()
    {
//renaming files in directory

        for ($i = 6; $i < 773; $i++) {
            $allfiles = Storage::disk('public')->files("img/products/$i");

            foreach ($allfiles as $file) {
                $newfile = str_replace(' ', '_', $file);
                // dd($newfile);
                if (!Storage::disk('public')->exists($newfile)) {
                    Storage::disk('public')->move($file, $newfile);
                }

                //dd($allfiles);
            }
        }
    }

      //  dd($allfiles);


//        //renaming files in DB
//        $allphotos = Product::all()->pluck('image', 'id')->toArray();
//        foreach ($allphotos as $key => $url) {
//            $oldname = $url;
//            $newname = str_replace(' ', '_', $url);
//            $url = $newname;
//            Table::where('id', $key)->update(['url' => $newname]);
//
//        }
//


//    }


    public function renametables()
    {
        //renaming files in DB
//        $alltables = Table::all()->pluck('url', 'id')->toArray();
//        foreach ($alltables as $key => $table) {
//            $oldname = $table;
//            $newname = 'img/' . str_replace(' ', '_', $table);
//            $table = $newname;
//            Table::where('id', $key)->update(['url' => $newname]);

//renaming files in directory
//        $allfiles = Storage::disk('public')->files('img/tables');
//        //dd($allfiles);
//        foreach ($allfiles as $file){
//            $newfile = str_replace(' ', '_', $file);
//            if(!Storage::disk('public')->exists($newfile)){
//            Storage::disk('public')->rename($file, $newfile);}
//        }


//        }
    }
}
