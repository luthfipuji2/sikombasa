<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ParameterOrderDurasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parameter_order_durasi = array(
            array(1, 2500),
            array(2, 3000),
            array(3, 3500),
            array(4, 4000),
            array(5, 4500),
            array(6, 5000),
            array(7, 5500),
        );

    	    for ($row = 0; $row < count($parameter_order_durasi); $row++) {
            DB::table('parameter_order_durasi')->insert([
                'id_parameter_order_durasi'=>$row+1,
                'durasi'=>$parameter_order_durasi[$row][0],
                'harga'=>$parameter_order_durasi[$row][1],
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
                ]);
        }
    }
}
