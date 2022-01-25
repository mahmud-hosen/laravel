<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public $fillable = ['id','user_id','ip_address','name','phone_no','shipping_address','email','message','is_paid','is_completed','is_seen_by_admin',];

   
}


