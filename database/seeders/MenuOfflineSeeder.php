<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuOfflineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parameter_order')->insert([
            'p_jenis_layanan' => 'Basic',
            'p_durasi_pertemuan' => '1-2',
            'p_harga' => '150000',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'p_jenis_layanan' => 'Basic',
            'p_durasi_pertemuan' => '2-3',
            'p_harga' => '350000',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'p_jenis_layanan' => 'Premium',
            'p_durasi_pertemuan' => '1-2',
            'p_harga' => '200000',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'p_jenis_layanan' => 'Premium',
            'p_durasi_pertemuan' => '2-3',
            'p_harga' => '400000',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
    }
}
