<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product-sizes', function (Blueprint $table) {
            $table->integer('SizeID')->unsigned();
            $table->foreign('SizeID')->references('SizeID')->on('sizes')->onDelete('cascade');
            $table->integer('ProductID')->unsigned();
            $table->foreign('ProductID')->references('ProductID')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('product-_sizes');
    }
}
