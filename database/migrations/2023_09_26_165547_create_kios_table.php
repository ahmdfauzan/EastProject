<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kios', function (Blueprint $table) {
            $table->id();
            $table->integer('kode_kios');
            $table->string('nama');
            $table->string('nama_pemilik');
            $table->text('alamat');
            $table->foreignId('provinsi_id');
            $table->foreignId('kabupaten_id');
            $table->foreignId('kecamatan_id');
            $table->foreignId('anper_id');
            $table->string('nama_distributor');
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
        Schema::dropIfExists('kios');
    }
}
