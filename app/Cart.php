<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = ['name','email','description','price','quantity','selling_price','weight','image','user_id','product_id','country_id'];

    public function product()
    {
        return $this->belongsTo(Prodect::class, 'product_id');
    }


    public function country()
    {
        return $this->belongsTo(Country::class , 'country_id');
    }
}
