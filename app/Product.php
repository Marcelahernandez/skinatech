<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'productos';
    protected $fillable = ['name'];

    public static function categorias(){
        return $this->belongsTo(CategoryProduct::class);
    }

    
}
