<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKolomHargaToTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->integer('harga_layanan')->nullable();
            $table->integer('harga_jenis_teks')->nullable();
            $table->integer('harga_teks')->nullable();
            $table->integer('harga_dokumen')->nullable();
            $table->integer('harga_subtitle')->nullable();
            $table->integer('harga_dubbing')->nullable();
            $table->integer('harga_dubber')->nullable();
            $table->integer('harga_menu_lisan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            //
        });
    }
}
