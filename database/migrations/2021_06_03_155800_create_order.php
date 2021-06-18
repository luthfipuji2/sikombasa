<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateOrder extends Migration
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
            $table->unsignedBigInteger('id_parameter_order_audio')->nullable();
            // $table->foreign('id_parameter_order_audio')->references('id_parameter_order_audio')->on('parameter_order_audio')->onDelete('cascade');
            $table->unsignedBigInteger('id_parameter_dubber')->nullable();
            $table->foreign('id_parameter_dubber')->references('id_parameter_dubber')->on('parameter_dubber')->onDelete('cascade');
            $table->unsignedBigInteger('id_parameter_jenis_layanan')->nullable();
            $table->foreign('id_parameter_jenis_layanan')->references('id_parameter_jenis_layanan')->on('parameter_jenis_layanan')->onDelete('cascade');
            $table->unsignedBigInteger('id_parameter_jenis_teks')->nullable();
            $table->foreign('id_parameter_jenis_teks')->references('id_parameter_jenis_teks')->on('parameter_jenis_teks')->onDelete('cascade');
            $table->unsignedBigInteger('id_parameter_order_dokumen')->nullable();
            $table->foreign('id_parameter_order_dokumen')->references('id_parameter_order_dokumen')->on('parameter_order_dokumen')->onDelete('cascade');
            $table->unsignedBigInteger('id_parameter_order_dubbing')->nullable();
            $table->foreign('id_parameter_order_dubbing')->references('id_parameter_order_dubbing')->on('parameter_order_dubbing')->onDelete('cascade');
            $table->unsignedBigInteger('id_parameter_order_subtitle')->nullable();
            $table->foreign('id_parameter_order_subtitle')->references('id_parameter_order_subtitle')->on('parameter_order_subtitle')->onDelete('cascade');
            $table->unsignedBigInteger('id_parameter_order_teks')->nullable();
            $table->foreign('id_parameter_order_teks')->references('id_parameter_order_teks')->on('parameter_order_teks')->onDelete('cascade');
            $table->string('jenis_layanan')->nullable();
            $table->string('jenis_teks')->nullable();
            $table->string('jumlah_halaman')->nullable();
            $table->text('text')->nullable();
            $table->string('nama_dokumen')->nullable();
            $table->string('upload_dokumen')->nullable();
            $table->string('path_file')->nullable();
            $table->string('size')->nullable();
            $table->string('ekstensi')->nullable();
            $table->integer('pages')->nullable();
            $table->integer('jumlah_karakter')->nullable();
            $table->string('durasi_video')->nullable();
            $table->integer('jumlah_dubber')->nullable();
            $table->string('durasi_pertemuan')->nullable();   
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('lokasi')->nullable();
            $table->dateTime('tgl_order')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('durasi_pengerjaan')->nullable();
            $table->string('durasi_audio')->nullable();
            $table->date('tanggal_pertemuan')->nullable();
            $table->time('waktu_pertemuan')->nullable();
            $table->string('tipe_offline')->nullable();
            $table->string('is_status')->nullable();
            $table->string('status_at')->nullable();
            $table->string('status_by')->nullable();
            $table->string('harga')->nullable();

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
