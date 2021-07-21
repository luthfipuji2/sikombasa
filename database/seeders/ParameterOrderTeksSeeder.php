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
            array(1, 100, 25000),
            array(101, 200, 25000),
            array(201, 300, 50000),
            array(301, 400, 50000),
            array(401, 500, 75000),
            array(501, 600, 75000),
            array(601, 700, 10000),
            array(701, 800, 100000),
            array(801, 900, 125000),
            array(901, 1000, 125000),
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
