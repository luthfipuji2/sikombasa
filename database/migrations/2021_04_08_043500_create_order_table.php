<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('id_order');
            $table->unsignedBigInteger('id_klien')->nullable();
            $table->foreign('id_klien')->references('id_klien')->on('klien')->onDelete('cascade');
            $table->unsignedBigInteger('id_translator')->nullable();
            $table->foreign('id_translator')->references('id_translator')->on('translator')->onDelete('cascade');
            $table->unsignedBigInteger('id_parameter_order')->nullable();
            $table->foreign('id_parameter_order')->references('id_parameter_order')->on('parameter_order')->onDelete('cascade');
            $table->string('jenis_layanan')->nullable();
            $table->string('jumlah_halaman')->nullable();
            $table->string('text')->nullable();
            $table->string('nama_file')->nullable();
            $table->string('nama_upload')->nullable();
            $table->string('path_file')->nullable();
            $table->string('size')->nullable();
            $table->string('ekstensi')->nullable();
            $table->integer('jumlah_karakter')->nullable();
            $table->string('durasi_video')->nullable();
            $table->integer('jumlah_dubber')->nullable();
            $table->string('durasi_pertemuan')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('lokasi')->nullable();
            $table->date('tgl_order')->nullable();
            $table->string('durasi_pengerjaan')->nullable();
            $table->string('is_status')->nullable();
            $table->string('status_at')->nullable();
            $table->string('status_by')->nullable();

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
        Schema::dropIfExists('order');
    }
}
