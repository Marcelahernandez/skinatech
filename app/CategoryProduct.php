<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $table = 'category_product';
    protected $fillable = ['id_category','id_products'];
    
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
