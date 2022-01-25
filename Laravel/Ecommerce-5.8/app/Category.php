<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    

   

    public function products()
    {
        return $this->hasOne(Product::class,'category_id','id');
    }
}
