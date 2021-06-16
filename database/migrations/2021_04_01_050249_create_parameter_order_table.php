<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParameterOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameter_order', function (Blueprint $table) {
            $table->bigIncrements('id_parameter_order');
            $table->string('p_durasi_file')->nullable();
            $table->string('p_durasi_audio')->nullable();
            $table->string('p_jumlah_dubber')->nullable();
            $table->string('p_durasi_pertemuan')->nullable();
            $table->string('p_jumlah_karakter')->nullable();
            $table->string('p_jumlah_halaman')->nullable();
            $table->string('p_jenis_layanan')->nullable();
            $table->integer('harga')->nullable();
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
        Schema::dropIfExists('parameter_order');
    }
}
