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
            $table->increments('id');
            $table->string('product_name');
            $table->unsignedInteger('product_category');
            $table->unsignedInteger('product_brand');
            $table->unsignedInteger('product_quantity');
            $table->string('product_model_no');
            $table->string('product_code');
            $table->string('product_color');
            $table->string('product_retail_price');
            $table->string('product_price');
            $table->string('product_special_price')->nullable();
            $table->string('product_size')->nullable();
            $table->text('product_description');
            $table->text('product_specification')->nullable();
            $table->string('product_images');
            $table->integer('product_status')->default(0);
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
        Schema::dropIfExists('products');
    }
}
