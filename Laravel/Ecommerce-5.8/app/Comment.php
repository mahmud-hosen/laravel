<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Relation  product table with category table 
    // Customar table-> primarykey(id) will be Comment table->(user_id) foreign_key 
    public function relationtocustomer(){
        return $this->hasOne('App\Customar', 'id','user_id');

    } 
}
