<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select('cat_id','sup_id','product_name','product_Code','product_short_description','buying_price','selling_price','publication_status','image')->get();

    }

  
}


