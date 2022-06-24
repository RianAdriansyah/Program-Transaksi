<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('harga_bandrol');
            $table->bigInteger('qty');
            $table->double('diskon_pct');
            $table->double('diskon_nilai');
            $table->double('harga_diskon');
            $table->double('total');
            $table->bigInteger('sales_id')->unsigned();
            $table->bigInteger('barang_id')->unsigned();
            $table->foreign('sales_id')->references('id')->on('sales');
            $table->foreign('barang_id')->references('id')->on('barangs');
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
        Schema::dropIfExists('sales_details');
    }
};
