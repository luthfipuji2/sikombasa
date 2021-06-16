<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParameterOrderTeks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameter_order_teks', function (Blueprint $table) {
            $table->bigIncrements('id_parameter_order_teks');
            $table->integer('jumlah_karakter_min')->nullable();
            $table->integer('jumlah_karakter_max')->nullable();
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
        Schema::dropIfExists('parameter_order_teks');
    }
}
