<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ParameterOrderDubbingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parameter_order_dubbing = array(
            array(1, 100, 10000),
            array(101, 200, 20000),
            array(201, 300, 30000),
            array(301, 400, 40000),
            array(401, 500, 50000),
            array(501, 600, 60000),
            array(601, 700, 70000),
            array(701, 800, 80000),
            array(801, 900, 90000),
            array(901, 1000, 100000),
        );

    	    for ($row = 0; $row < count($parameter_order_dubbing); $row++) {
            DB::table('parameter_order_dubbing')->insert([
                'id_parameter_order_dubbing'=>$row+1,
                'durasi_video_min'=>$parameter_order_dubbing[$row][0],
                'durasi_video_max'=>$parameter_order_dubbing[$row][1],
                'harga'=>$parameter_order_dubbing[$row][2],
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
                ]);
        }
    }
}
