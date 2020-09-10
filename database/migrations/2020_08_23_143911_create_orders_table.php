<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('shipping_id')->unsigned();
            $table->decimal('total',10,2);
            $table->enum('status',['success','pending','return','shipped'])->default('pending');
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('customer_id')->references('id')->on('customers')->cascadeOnDelete();
            $table->foreign('shipping_id')->references('id')->on('shippings')->cascadeOnDelete();
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
