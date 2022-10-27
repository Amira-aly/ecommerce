<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodect extends Model
{
    protected $table = 'prodects';
    protected $fillable = ['name','description','price','category_id','country_id','selling_price','weight','image'];

    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class , 'country_id');
    }

    public function product(){
        return $this->hasmany(Cart::class , 'product_id');
    }
}
