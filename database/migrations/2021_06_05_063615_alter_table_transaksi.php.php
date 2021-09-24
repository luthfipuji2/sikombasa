<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterTableTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id_transaksi');
            $table->unsignedBigInteger('id_order');
            $table->foreign('id_order')->references('id_order')->on('order')->onDelete('cascade');
            $table->unsignedBigInteger('id_bank');
            $table->foreign('id_bank')->references('id_bank')->on('bank')->onDelete('cascade');
            $table->dateTime('tgl_transaksi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('nominal_transaksi')->nullable();
            $table->string('bukti_transaksi')->nullable();
            $table->string('status_transaksi')->default('Pending');
            $table->integer('nominal_return')->nullable();
            $table->string('bukti_return')->nullable();
            $table->string('no_rek_return')->nullable();
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
        Schema::dropIfExists('transaksi');
    }
}
