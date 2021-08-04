<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNilaiSertifikatFieldToSeleksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seleksi', function (Blueprint $table) {
            $table->float('nilai_sertifikat')->nullable();
            $table->text('catatan_sertifikat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seleksi', function (Blueprint $table) {
            //
        });
    }
}
