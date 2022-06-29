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
        Schema::create('data_backups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('harga_bandrol');
            $table->bigInteger('qty');
            $table->double('diskon_pct');
            $table->double('diskon_nilai');
            $table->double('harga_diskon');
            $table->double('total');
            $table->double('subtotal');
            $table->double('diskon');
            $table->double('ongkir');
            $table->double('total_bayar');
            $table->bigInteger('sales_id')->unsigned()->nullable();
            $table->bigInteger('barang_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned()->nullable();
            $table->foreign('sales_id')->references('id')->on('sales');
            $table->foreign('barang_id')->references('id')->on('barangs');
            $table->foreign('customer_id')->references('id')->on('customers');
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
        Schema::dropIfExists('data_backups');
    }
};
