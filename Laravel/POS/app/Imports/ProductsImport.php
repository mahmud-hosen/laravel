<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([

            'cat_id'=> $row[0],
            'sup_id'=> $row[1],
            'product_name'=> $row[2],
            'product_Code'=> $row[3],
            'product_short_description'=> $row[4],
            'buying_price'=> $row[5],
            'selling_price'=> $row[6],
            'publication_status'=> $row[7],
            'image'=> $row[8],

        ]);
    }

    
 



   







}











