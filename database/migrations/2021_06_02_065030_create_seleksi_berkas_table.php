<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeleksiBerkasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seleksi_berkas', function (Blueprint $table) {
            $table->bigIncrements('id_seleksi_berkas');
            $table->unsignedBigInteger('id_admin');
            $table->foreign('id_admin')->references('id_admin')->on('admin')->onDelete('cascade');
            $table->unsignedBigInteger('id_translator');
            $table->foreign('id_translator')->references('id_translator')->on('translator')->onDelete('cascade');
            $table->float('nilai')->nullable();
            $table->string('hasil')->default('no');
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
        Schema::dropIfExists('seleksi_berkas');
    }
}
