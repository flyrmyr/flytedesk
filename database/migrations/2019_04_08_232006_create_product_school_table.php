<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_school', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->integer('school_id')->unsigned();
        });

       //  Schema::table('product_school', function($table) {
       //      $table->foreign('school_id')->references('id')->on('schools');
       //      $table->foreign('product_id')->references('id')->on('products');
       // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_school');
    }
}
