<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Icon;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'description', 'categorie_id', 'created_at', 'image', 'price', 'attachment','photos','techimage', 'installimage1', 'installimage2', 'content',];

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    public function tables(){
        return $this->belongsToMany(Table::class);
    }

    public function icons(){
        return $this->belongsToMany(Icon::class);

    }




}
