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
        // $parameter_order_audio = array(
        //     array(1, 300, 35000),
        //     array(301, 500, 55000),
        //     array(501, 1000, 100000),
        //     array(1001, 5000, 500000),
        //     array(5001, 10000, 950000),
        // );
        DB::table('parameter_order_audio')->insert([
            'id_parameter_order_audio' => '1',
            'min_durasi_audio' => '1',
            'max_durasi_audio' => '300',
            'harga' => '35000',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order_audio')->insert([
            'id_parameter_order_audio' => '2',
            'min_durasi_audio' => '301',
            'max_durasi_audio' => '500',
            'harga' => '55000',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order_audio')->insert([
            'id_parameter_order_audio' => '3',
            'min_durasi_audio' => '501',
            'max_durasi_audio' => '1000',
            'harga' => '10000',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order_audio')->insert([
            'id_parameter_order_audio' => '4',
            'min_durasi_audio' => '1001',
            'max_durasi_audio' => '5000',
            'harga' => '500000',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order_audio')->insert([
            'id_parameter_order_audio' => '5',
            'min_durasi_audio' => '5001',
            'max_durasi_audio' => '10000',
            'harga' => '900000',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

    	    // for ($row = 0; $row < count($parameter_order_audio); $row++) {
            // DB::table('parameter_order_audio')->insert([
            //     'id_parameter_order_audio'=>$row+1,
            //     'min_durasi_audio'=>$parameter_order_audio[$row][0],
            //     'max_durasi_audio'=>$parameter_order_audio[$row][1],
            //     'harga'=>$parameter_order_audio[$row][2],
            //     'created_at'=>Carbon::now(),
            //     'updated_at'=>Carbon::now()
            //     ]);
    }
}
