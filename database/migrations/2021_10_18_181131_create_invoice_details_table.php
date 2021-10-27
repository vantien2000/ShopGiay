<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->integer('InvoiceID')->unsigned();
            $table->foreign('InvoiceID')->references('InvoiceID')->on('invoices')->onDelete('cascade');
            $table->integer('ProductID')->unsigned();
            $table->foreign('ProductID')->references('ProductID')->on('products')->onDelete('cascade');
            $table->integer('Quanlity');
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
        Schema::dropIfExists('invoice_details');
    }
}
