<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('parameter_order')->insert([
            'p_durasi_pertemuan' => '<=1 Day',
            'p_jenis_layanan' => 'premium',
            'harga' => '100000',
        ]);
        \DB::table('parameter_order')->insert([
            'p_durasi_pertemuan' => '1-3 Day',
            'p_jenis_layanan' => 'premium',
            'harga' => '200000',
        ]);
        \DB::table('parameter_order')->insert([
            'p_durasi_pertemuan' => '3-5 Day',
            'p_jenis_layanan' => 'premium',
            'harga' => '300000',
        ]);
        \DB::table('parameter_order')->insert([
            'p_durasi_pertemuan' => '<=1 Day',
            'p_jenis_layanan' => 'basic',
            'harga' => '70000',
        ]);
        \DB::table('parameter_order')->insert([
            'p_durasi_pertemuan' => '1-3 Day',
            'p_jenis_layanan' => 'basic',
            'harga' => '140000',
        ]);
        \DB::table('parameter_order')->insert([
            'p_durasi_pertemuan' => '3-5 Day',
            'p_jenis_layanan' => 'basic',
            'harga' => '210000',
        ]);
    }
}
