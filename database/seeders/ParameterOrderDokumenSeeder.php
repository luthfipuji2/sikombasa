<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ParameterOrderDokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parameter_order_dokumen = array(
            array(1, 10, 5000),
            array(11, 20, 7500),
            array(21, 30, 10000),
            array(31, 40, 12500),
            array(41, 50, 15000),
            array(51, 60, 17500),
            array(61, 70, 20000),
            array(71, 80, 22500),
            array(81, 90, 25000),
            array(91, 100, 27500),
        );

    	    for ($row = 0; $row < count($parameter_order_dokumen); $row++) {
            DB::table('parameter_order_dokumen')->insert([
                'id_parameter_order_dokumen'=>$row+1,
                'jumlah_halaman_min'=>$parameter_order_dokumen[$row][0],
                'jumlah_halaman_max'=>$parameter_order_dokumen[$row][1],
                'harga'=>$parameter_order_dokumen[$row][2],
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
                ]);
        }
    }
}
