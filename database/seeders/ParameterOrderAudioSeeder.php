<?php

namespace Database\Seeders;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class ParameterOrderAudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parameter_order_audio = array(
            array(1, 100, 10000),
            array(101, 200, 20000),
            array(201, 300, 30000),
            array(301, 400, 40000),
            array(401, 500, 50000),
            array(501, 1000, 100000),
            array(1001, 3000, 300000),
            array(3001, 5000, 500000),
            array(5001, 7000, 700000),
            array(7001, 10000, 950000),
        );

    	    for ($row = 0; $row < count($parameter_order_audio); $row++) {
            DB::table('parameter_order_audio')->insert([
                'id_parameter_order_audio'=>$row+1,
                'min_durasi_audio'=>$parameter_order_audio[$row][0],
                'max_durasi_audio'=>$parameter_order_audio[$row][1],
                'harga'=>$parameter_order_audio[$row][2],
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
                ]);
        }
    }
}
