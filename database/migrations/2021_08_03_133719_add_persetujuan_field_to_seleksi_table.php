<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPersetujuanFieldToSeleksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seleksi', function (Blueprint $table) {
            $table->float('nilai_video')->nullable();
            $table->float('nilai_cv')->nullable();
            $table->float('nilai_portofolio')->nullable();
            $table->float('nilai_ijazah')->nullable();
            $table->float('nilai_sk_sehat')->nullable();
            $table->float('nilai_skck')->nullable();
            $table->text('catatan_video')->nullable();
            $table->text('catatan_cv')->nullable();
            $table->text('catatan_portofolio')->nullable();
            $table->text('catatan_ijazah')->nullable();
            $table->text('catatan_sk_sehat')->nullable();
            $table->text('catatan_skck')->nullable();
            $table->string('persetujuan')->default('Setuju');
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
