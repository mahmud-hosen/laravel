<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->string('product_name');
            $table->text('product_short_description');
            $table->text('product_long_description');
            $table->integer('product_price');
            $table->tinyInteger('publication_status');
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();



         





        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
