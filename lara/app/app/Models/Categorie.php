<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'image', 'cat_name', 'parent_cat_id', 'cat_order',];



    public function product(){
        return $this->belongsToMany(Product::class);
    }

    public function parent(){
        return $this->belongsTo(\App\Nova\Categorie::class, 'cat_name');
    }
}
