<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateHistoryHargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_harga', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_parameter_order')->nullable();
            $table->foreign('id_parameter_order')->references('id_parameter_order')->on('parameter_order')->onDelete('cascade');
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
            $table->string('jenis_parameter')->nullable();
            $table->dateTime('tgl_perubahan')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('harga_perubahan')->nullable();
            $table->text('deskripsi')->nullable();
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
        Schema::dropIfExists('history_harga');
    }
}
