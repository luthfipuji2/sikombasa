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
            $table->string('p_durasi_pertemuan')->nullable();
            $table->string('p_jenis_layanan')->nullable();
            $table->string('p_durasi_audio')->nullable();
            $table->integer('p_harga')->nullable();
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
