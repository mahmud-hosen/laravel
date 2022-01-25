<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    // For soft delete :
    // 1)  use SoftDeletes;  2) use Illuminate\Database\Eloquent\SoftDeletes; 3)deleted_at column in product table
    // 4)  $product = Product::find($id);   $product->delete();

     use SoftDeletes;

    protected $fillable = ['product_name','category_id','product_short_description','product_long_description','product_price','publication_status','deleted_at','image',];
        
    // Relation  product table with category table 
    // Category table-> primarykey(id) will be Product table->(category_id) foreign_key 
    public function relationtoCategory(){
        return $this->hasOne('App\Category', 'id','category_id');

    } 


}
