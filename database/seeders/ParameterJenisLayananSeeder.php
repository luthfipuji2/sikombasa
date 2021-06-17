<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ParameterJenisLayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parameter_jenis_layanan = array(
            array("basic", 2500),
            array("premium", 5000),
        );

    	    for ($row = 0; $row < count($parameter_jenis_layanan); $row++) {
            DB::table('parameter_jenis_layanan')->insert([
                'id_parameter_jenis_layanan'=>$row+1,
                'p_jenis_layanan'=>$parameter_jenis_layanan[$row][0],
                'harga'=>$parameter_jenis_layanan[$row][1],
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
                ]);
        }
    }
}
