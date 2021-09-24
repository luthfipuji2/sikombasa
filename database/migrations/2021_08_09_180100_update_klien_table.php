<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateKlienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('klien', function (Blueprint $table) {

            $table->renameColumn('provinsi', 'provinces_id');
            $table->renameColumn('kabupaten', 'cities_id');
            $table->renameColumn('kecamatan', 'districts_id');     
            $table->renameColumn('alamat', 'villages_id');
            $table->foreign('provinces_id')->references('id')->on('indonesia_provinces')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('cities_id')->references('id')->on('indonesia_cities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('districts_id')->references('id')->on('indonesia_districts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('villages_id')->references('id')->on('indonesia_villages')->onUpdate('cascade')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('klien', function (Blueprint $table) {

        });
    }
}
