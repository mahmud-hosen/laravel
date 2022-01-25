<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function p_name()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
}
