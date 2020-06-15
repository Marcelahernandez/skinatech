<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categorias';
    protected $fillable = ['name'];

    public static function subcategories($id){
        return Category::where('padre','=',$id)
        ->get();
    }
}
