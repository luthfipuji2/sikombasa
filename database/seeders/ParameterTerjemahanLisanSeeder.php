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
            'p_durasi_pengerjaan' => '1',
            'p_harga' => '25000', //(basic + durasi<=5 menit = 10.000) + (durasi pengerjaan = 15.000) = (Total = 25.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        
        DB::table('parameter_order')->insert([
            'id_parameter_order' => '2',
            'p_jenis_layanan' => 'Basic',
            'p_durasi_audio' => '<=300',
            'p_durasi_pengerjaan' => '2',
            'p_harga' => '20000', //(basic + durasi<=5 menit = 10.000) + (durasi pengerjaan = 10.000) = (Total = 20.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '3',
            'p_jenis_layanan' => 'Basic',
            'p_durasi_audio' => '<=300',
            'p_durasi_pengerjaan' => '3',
            'p_harga' => '15000', //(basic + durasi<=5 menit = 10.000) + (durasi pengerjaan = 5.000) = (Total = 15.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '4',
            'p_jenis_layanan' => 'Basic',
            'p_durasi_audio' => '<=900',
            'p_durasi_pengerjaan' => '1',
            'p_harga' => '35000',//(basic + durasi<=10 menit = 20.000) + (durasi pengerjaan = 15.000) = (Total = 35.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '5',
            'p_jenis_layanan' => 'Basic',
            'p_durasi_audio' => '<=900',
            'p_durasi_pengerjaan' => '2',
            'p_harga' => '30000',//(basic + durasi<=10 menit = 20.000) + (durasi pengerjaan = 10.000) = (Total = 30.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        
        DB::table('parameter_order')->insert([
            'id_parameter_order' => '6',
            'p_jenis_layanan' => 'Basic',
            'p_durasi_audio' => '<=900',
            'p_durasi_pengerjaan' => '3',
            'p_harga' => '25000',//(basic + durasi<=10 menit = 20.000) + (durasi pengerjaan = 5.000) = (Total = 25.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '7',
            'p_jenis_layanan' => 'Basic',
            'p_durasi_audio' => '<=1800',
            'p_durasi_pengerjaan' => '1',
            'p_harga' => '65000',//(basic + durasi<=30 menit = 50.000) + (durasi pengerjaan = 15.000) = (Total = 65.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '8',
            'p_jenis_layanan' => 'Basic',
            'p_durasi_audio' => '<=1800',
            'p_durasi_pengerjaan' => '2',
            'p_harga' => '60000',//(basic + durasi<=30 menit = 50.000) + (durasi pengerjaan = 10.000) = (Total = 60.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '9',
            'p_jenis_layanan' => 'Basic',
            'p_durasi_audio' => '<=1800',
            'p_durasi_pengerjaan' => '3',
            'p_harga' => '55000',//(basic + durasi<=30 menit = 50.000) + (durasi pengerjaan = 5.000) = (Total = 55.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '10',
            'p_jenis_layanan' => 'Basic',
            'p_durasi_audio' => '<=3600',
            'p_durasi_pengerjaan' => '1',
            'p_harga' => '115000',//(basic + durasi<=1 jam = 100.000) + (durasi pengerjaan = 15.000) = (Total = 115.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '11',
            'p_jenis_layanan' => 'Basic',
            'p_durasi_audio' => '<=3600',
            'p_durasi_pengerjaan' => '2',
            'p_harga' => '110000',//(basic + durasi<=1 jam = 100.000) + (durasi pengerjaan = 10.000) = (Total = 110.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '12',
            'p_jenis_layanan' => 'Basic',
            'p_durasi_audio' => '<=3600',
            'p_durasi_pengerjaan' => '3',
            'p_harga' => '105000',//(basic + durasi<=1 jam = 100.000) + (durasi pengerjaan = 5.000) = (Total = 105.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '13',
            'p_jenis_layanan' => 'Basic',
            'p_durasi_audio' => '<=10800',
            'p_durasi_pengerjaan' => '1',
            'p_harga' => '315000',//(basic + durasi<=3 jam = 300.000) + (durasi pengerjaan = 15.000) = (Total = 315.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '14',
            'p_jenis_layanan' => 'Basic',
            'p_durasi_audio' => '<=10800',
            'p_durasi_pengerjaan' => '2',
            'p_harga' => '310000',//(basic + durasi<=3 jam = 300.000) + (durasi pengerjaan = 10.000) = (Total = 310.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '15',
            'p_jenis_layanan' => 'Basic',
            'p_durasi_audio' => '<=10800',
            'p_durasi_pengerjaan' => '3',
            'p_harga' => '305000',//(basic + durasi<=3 jam = 300.000) + (durasi pengerjaan = 5.000) = (Total = 305.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '16',
            'p_jenis_layanan' => 'Premium',
            'p_durasi_audio' => '<=300',
            'p_durasi_pengerjaan' => '1',
            'p_harga' => '35000',//(premium(10.000) + durasi<=5 menit = 20.000) + (durasi pengerjaan = 15.000) = (Total = 35.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '17',
            'p_jenis_layanan' => 'Premium',
            'p_durasi_audio' => '<=300',
            'p_durasi_pengerjaan' => '2',
            'p_harga' => '30000',//(premium(10.000) + durasi<=5 menit = 20.000) + (durasi pengerjaan = 10.000) = (Total = 30.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '18',
            'p_jenis_layanan' => 'Premium',
            'p_durasi_audio' => '<=300',
            'p_durasi_pengerjaan' => '3',
            'p_harga' => '25000',//(premium(10.000) + durasi<=5 menit = 20.000) + (durasi pengerjaan = 5.000) = (Total = 25.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '19',
            'p_jenis_layanan' => 'Premium',
            'p_durasi_audio' => '<=900',
            'p_durasi_pengerjaan' => '1',
            'p_harga' => '45000',//(premium(10.000) + durasi<=10 menit = 30.000) + (durasi pengerjaan = 15.000) = (Total = 45.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '20',
            'p_jenis_layanan' => 'Premium',
            'p_durasi_audio' => '<=900',
            'p_durasi_pengerjaan' => '2',
            'p_harga' => '40000',//(premium(10.000) + durasi<=10 menit = 30.000) + (durasi pengerjaan = 10.000) = (Total = 40.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '21',
            'p_jenis_layanan' => 'Premium',
            'p_durasi_audio' => '<=900',
            'p_durasi_pengerjaan' => '3',
            'p_harga' => '35000',//(premium(10.000)+ durasi<=10 menit = 30.000) + (durasi pengerjaan = 5.000) = (Total = 35.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '22',
            'p_jenis_layanan' => 'Premium',
            'p_durasi_audio' => '<=1800',
            'p_durasi_pengerjaan' => '1',
            'p_harga' => '75000',//(premium(10.000)+ durasi<=30 menit = 60.000) + (durasi pengerjaan = 15.000) = (Total = 75.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '23',
            'p_jenis_layanan' => 'Premium',
            'p_durasi_audio' => '<=1800',
            'p_durasi_pengerjaan' => '2',
            'p_harga' => '70000',//(premium(10.000)+ durasi<=30 menit = 60.000) + (durasi pengerjaan = 10.000) = (Total = 70.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '24',
            'p_jenis_layanan' => 'Premium',
            'p_durasi_audio' => '<=1800',
            'p_durasi_pengerjaan' => '3',
            'p_harga' => '65000',//(premium(10.000)+ durasi<=30 menit = 60.000) + (durasi pengerjaan = 5.000) = (Total = 65.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '25',
            'p_jenis_layanan' => 'Premium',
            'p_durasi_audio' => '<=3600',
            'p_durasi_pengerjaan' => '1',
            'p_harga' => '125000',//(premium(10.000)+ durasi<=1 jam= 110.000) + (durasi pengerjaan = 15.000) = (Total = 125.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '26',
            'p_jenis_layanan' => 'Premium',
            'p_durasi_audio' => '<=3600',
            'p_durasi_pengerjaan' => '2',
            'p_harga' => '120000',//(premium(10.000)+ durasi<=1 jam= 110.000) + (durasi pengerjaan = 10.000) = (Total = 120.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '27',
            'p_jenis_layanan' => 'Premium',
            'p_durasi_audio' => '<=3600',
            'p_durasi_pengerjaan' => '3',
            'p_harga' => '115000',//(premium(10.000)+ durasi<=1 jam= 110.000) + (durasi pengerjaan = 5.000) = (Total = 115.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '28',
            'p_jenis_layanan' => 'Premium',
            'p_durasi_audio' => '<=10800',
            'p_durasi_pengerjaan' => '1',
            'p_harga' => '325000',//(premium(10.000)+ durasi<=3 jam= 310.000) + (durasi pengerjaan = 15.000) = (Total = 325.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '29',
            'p_jenis_layanan' => 'Premium',
            'p_durasi_audio' => '<=10800',
            'p_durasi_pengerjaan' => '2',
            'p_harga' => '320000',//(premium(10.000)+ durasi<=3 jam= 310.000) + (durasi pengerjaan = 10.000) = (Total = 320.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('parameter_order')->insert([
            'id_parameter_order' => '30',
            'p_jenis_layanan' => 'Premium',
            'p_durasi_audio' => '<=10800',
            'p_durasi_pengerjaan' => '3',
            'p_harga' => '315000',//(premium(10.000)+ durasi<=3 jam= 310.000) + (durasi pengerjaan = 5.000) = (Total = 315.000)
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
    }
}
