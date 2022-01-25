<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomarOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customar_orders', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->integer('customar_id');
            $table->integer('shipping_id');
            $table->string('total_price');
            $table->string('payment_type');
            $table->string('order_status')->default('Pending..');
            $table->string('payment_status')->default('Pending..');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customar_orders');
    }
}
