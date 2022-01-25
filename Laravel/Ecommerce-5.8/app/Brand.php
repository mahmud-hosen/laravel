<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

    public function sub_cat()
    {
        return $this->hasOne(Category::class,'brand_id','id');
    }


    
     
   
}
