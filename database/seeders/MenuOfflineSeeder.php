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
            'p_durasi_pertemuan' => '1',
            'p_harga' => '150.000', //Tanpa penginapan : (snack + bensin = 100.000)+(laba = 50.000)= Total(150.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        
        DB::table('parameter_order')->insert([
            'p_jenis_layanan' => 'Basic',
            'p_durasi_pertemuan' => '1-2',
            'p_harga' => '250.000', //(Penginapan translator = 100.000)+ (snack + bensin = 100.000 ) + (laba = 50.000)= Total (250.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'p_jenis_layanan' => 'Basic',
            'p_durasi_pertemuan' => '2-3',
            'p_harga' => '350.000',//(Penginapan translator = 200.000)+ (snack + bensin = 100.000 ) + (laba = 50.000)= Total (350.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'p_jenis_layanan' => 'Premium',
            'p_durasi_pertemuan' => '1',
            'p_harga' => '200.000',//Tanpa penginapan : (snack + bensin = 100.000)+(gift = 50.000)+(laba = 50.000)= Total(200.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'p_jenis_layanan' => 'Premium',
            'p_durasi_pertemuan' => '1-2',
            'p_harga' => '400.000',//(Penginapan translator = 200.000)+ (snack + bensin = 100.000 ) +(gift = 50.000) + (laba = 50.000)= Total (400.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'p_jenis_layanan' => 'Premium',
            'p_durasi_pertemuan' => '2-3',
            'p_harga' => '600.000',//(Penginapan translator = 400.000)+ (snack + bensin = 100.000 ) +(gift = 50.000) + (laba = 50.000)= Total (600.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
    }
}
