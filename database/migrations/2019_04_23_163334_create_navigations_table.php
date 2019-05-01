<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavigationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navigations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('menu_name')->nullable();
            $table->string('menu_slug')->nullable();
            $table->string('ids')->nullable();
            $table->string('page_id')->nullable();
            $table->string('cat_id')->nullable();
            $table->string('menu_status')->nullable();
            $table->string('li_classes')->nullable();
            $table->string('description')->nullable();
            $table->string('isNewTab')->nullable();
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
        Schema::dropIfExists('navigations');
    }
}
