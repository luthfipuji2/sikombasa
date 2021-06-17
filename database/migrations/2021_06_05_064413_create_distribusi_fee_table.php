<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistribusiFeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribusi_fee', function (Blueprint $table) {
            $table->bigIncrements('id_fee');
            $table->unsignedBigInteger('id__transaksi');
            $table->foreign('id__transaksi')->references('id_transaksi')->on('transaksi')->onDelete('cascade');
            $table->integer('fee_translator');
            $table->integer('fee_sistem');
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
        Schema::dropIfExists('distribusi_fee');
    }
}