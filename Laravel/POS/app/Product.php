<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['cat_id','sup_id','product_name','product_Code','product_short_description','buying_price','selling_price','publication_status','image'];

}







