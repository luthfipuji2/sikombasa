<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableKeahlian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keahlian', function (Blueprint $table) {
            $table->bigIncrements('id_keahlian')->nullable();
            $table->string('nama_sertifikat')->nullable();
            $table->string('no_sertifikat')->nullable();
            $table->string('bukti_dokumen')->nullable();
            $table->string('diterbitkan_oleh')->nullable();
            $table->date('masa_berlaku')->nullable();
            $table->string('status_verifikasi')->nullable();
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
        Schema::dropIfExists('keahlian');
    }
}
