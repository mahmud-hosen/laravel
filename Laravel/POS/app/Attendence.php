<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    


    protected $fillable = ['user_id','att_date','att_year','product_long_description','attendence','edit_date',];

}
