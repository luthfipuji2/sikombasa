<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisi', function (Blueprint $table) {
            $table->bigIncrements('id_revisi');
            $table->unsignedBigInteger('id_order');
            $table->foreign('id_order')->references('id_order')->on('order')->onDelete('cascade');
            $table->text('text_revisi')->nullable();
            $table->string('path_file_revisi')->nullable();
            $table->text('pesan_revisi')->nullable();
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revisi');
    }
}
