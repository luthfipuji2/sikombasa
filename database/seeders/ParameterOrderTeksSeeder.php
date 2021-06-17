<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ParameterOrderTeksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parameter_order_teks = array(
            array(1, 100, 2500),
            array(101, 200, 2500),
            array(201, 300, 5000),
            array(301, 400, 5000),
            array(401, 500, 7500),
            array(501, 600, 7500),
            array(601, 700, 10000),
            array(701, 800, 10000),
            array(801, 900, 12500),
            array(901, 1000, 12500),
        );

    	    for ($row = 0; $row < count($parameter_order_teks); $row++) {
            DB::table('parameter_order_teks')->insert([
                'id_parameter_order_teks'=>$row+1,
                'jumlah_karakter_min'=>$parameter_order_teks[$row][0],
                'jumlah_karakter_max'=>$parameter_order_teks[$row][1],
                'harga'=>$parameter_order_teks[$row][2],
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
                ]);
        }
    }
}
