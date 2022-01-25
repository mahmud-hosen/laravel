<?php

namespace App\Http\Controllers;

use App\testapi;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Http;

class TestapiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return Http::get('https://jsonplaceholder.typicode.com/users')->body();
    }

   
}
