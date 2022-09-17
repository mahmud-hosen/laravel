<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class middlewareTestController extends Controller
{
     public function middlewareTest()
    {
        return view('middlewareTest');
    }
    public function userAge()
    {
        return view('userAge');
    }
    
}
