<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParameterOrderDubbing extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameter_order_dubbing', function (Blueprint $table) {
            $table->bigIncrements('id_parameter_order_dubbing');
            $table->string('durasi_video_min')->nullable();
            $table->string('durasi_video_max')->nullable();
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
        Schema::dropIfExists('parameter_order_dubbing');
    }
}
