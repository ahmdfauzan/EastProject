<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('no_penembusan');
            $table->string('nama_produsen');
            $table->string('distributor');
            $table->string('kode_distributor');
            $table->string('kode_so');
            $table->string('tgl_order');
            $table->string('total_kuantitas');
            $table->string('nomor_do');
            $table->string('nama_produk');
            $table->string('qty');
            $table->string('tanggal_do');
            $table->string('dibuat_oleh')->nullable();
            $table->string('dibuat_pada');
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
