<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParameterOrderDurasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order', function($table) {
            $table->unsignedBigInteger('id_parameter_order_durasi')->after('id_parameter_order_teks')->nullable();
            $table->foreign('id_parameter_order_durasi')->references('id_parameter_order_durasi')->on('parameter_order_durasi')->onDelete('cascade');
 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
