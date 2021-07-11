<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ParameterJenisTeksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parameter_jenis_teks = array(
            array("Umum", 2500),
            array("Khusus", 5000),
        );

    	    for ($row = 0; $row < count($parameter_jenis_teks); $row++) {
            DB::table('parameter_jenis_teks')->insert([
                'id_parameter_jenis_teks'=>$row+1,
                'p_jenis_teks'=>$parameter_jenis_teks[$row][0],
                'harga'=>$parameter_jenis_teks[$row][1],
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
                ]);
        }
    }
}
