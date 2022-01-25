<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('customer_id');
            $table->string('order_date');
            $table->string('order_status');
            $table->string('totall_products');
            $table->string('sub_totall');
            $table->string('vat');
            $table->string('total');
            $table->string('payment_status');
            $table->string('pay')->nullable();
            $table->string('due')->nullable();

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
        Schema::dropIfExists('orders');
    }
}
