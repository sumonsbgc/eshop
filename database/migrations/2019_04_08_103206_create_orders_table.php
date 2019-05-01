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
            $table->increments('id');
            $table->integer('receipt_no');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('product_quantity');
            $table->string('product_color')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_price')->nullable();
            $table->string('coupon')->nullable();
            $table->string('discount_amount')->default(0);
            $table->string('shipping_address');
            $table->string('phone');
            $table->string('shipping_method');
            $table->string('shipping_fee')->nullable();
            $table->string('payment_option');
            $table->string('total_payment');
            $table->string('bkash_mobile_no')->nullable();
            $table->string('transaction_id')->nullable();
            $table->integer('status')->default(0);
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
