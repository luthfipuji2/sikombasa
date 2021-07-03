<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ParameterTerjemahanLisanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parameter_order')->insert([
            'id_parameter_order' => '1',
            'p_jenis_layanan' => 'Basic',
            'p_durasi_audio' => '<=300',
            'harga' => '15000',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '2',
            'p_jenis_layanan' => 'Basic',
            'p_durasi_audio' => '<=900',
            'harga' => '35000',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '3',
            'p_jenis_layanan' => 'Basic',
            'p_durasi_audio' => '<=1800',
            'harga' => '65000',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '4',
            'p_jenis_layanan' => 'Basic',
            'p_durasi_audio' => '<=3600',
            'harga' => '125000',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '5',
            'p_jenis_layanan' => 'Basic',
            'p_durasi_audio' => '<=10800',
            'harga' => '300000', //Diskon
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '6',
            'p_jenis_layanan' => 'Premium',
            'p_durasi_audio' => '<=300',
            'harga' => '20000',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '7',
            'p_jenis_layanan' => 'Premium',
            'p_durasi_audio' => '<=900',
            'harga' => '40000',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '8',
            'p_jenis_layanan' => 'Premium',
            'p_durasi_audio' => '<=1800',
            'harga' => '70000',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '9',
            'p_jenis_layanan' => 'Premium',
            'p_durasi_audio' => '<=3600',
            'harga' => '130000',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '10',
            'p_jenis_layanan' => 'Premium',
            'p_durasi_audio' => '<=10800',
            'harga' => '305000', 
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
    }
}
