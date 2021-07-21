<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ParameterDubberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parameter_dubber = array(
            array(1, 50000),
            array(2, 100000),
            array(3, 150000),
            array(4, 200000),
            array(5, 250000),
        );

    	    for ($row = 0; $row < count($parameter_dubber); $row++) {
            DB::table('parameter_dubber')->insert([
                'id_parameter_dubber'=>$row+1,
                'p_jumlah_dubber'=>$parameter_dubber[$row][0],
                'harga'=>$parameter_dubber[$row][1],
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
                ]);
        }
    }
}
