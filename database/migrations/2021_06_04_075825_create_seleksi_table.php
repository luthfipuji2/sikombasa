<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeleksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seleksi', function (Blueprint $table) {
            $table->bigIncrements('id_seleksi_berkas');
            $table->string('penyeleksi')->nullable();
            $table->unsignedBigInteger('id_translator');
            $table->foreign('id_translator')->references('id_translator')->on('translator')->onDelete('cascade');
            $table->float('nilai_berkas')->nullable();
            $table->string('hasil')->default('tidak lolos');
            $table->string('pewawancara')->nullable();
            $table->string('catatan')->nullable();
            $table->float('nilai_wawancara')->nullable();
            $table->string('hasil_wawancara')->default('tidak lolos');
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
        Schema::dropIfExists('seleksi');
    }
}
