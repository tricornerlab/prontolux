<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Icon extends Model
{
    use HasFactory;
    protected $fillable = [ 'icon_info', 'icon_url', 'icon_id', 'id'];

    public function products(){
        return $this->belongsToMany(Product::class);
    }


}
