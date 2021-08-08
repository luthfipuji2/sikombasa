<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bank')->insert([
            'nama_bank' => 'BCA',
            'kode_bank' => '014',
            'kode_bank_int' => 'CENAIDJA',
            'nama_rekening' => 'Qonitha Prasetyowati',
            'no_rekening' => '4729847248091',
            'lokasi_cabang' => 'KCU SUDIRMAN',
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('bank')->insert([
            'nama_bank' => 'BRI',
            'kode_bank' => '002',
            'kode_bank_int' => 'BRINIDJAXXX',
            'nama_rekening' => 'Luthfi Puji',
            'no_rekening' => '09402840280913',
            'lokasi_cabang' => 'KC BRI SOLO - SLAMET RIYADI',
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('bank')->insert([
            'nama_bank' => 'BNI',
            'kode_bank' => '427',
            'kode_bank_int' => 'BNINIDJASMR',
            'nama_rekening' => 'Pramesti Dyah',
            'no_rekening' => '219381830183',
            'lokasi_cabang' => 'BNI - Universitas Sebelas Maret',
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('bank')->insert([
            'nama_bank' => 'Mandiri',
            'kode_bank' => '008',
            'kode_bank_int' => 'BMRIIDJAXXX',
            'nama_rekening' => 'Nursiah Hayati',
            'no_rekening' => '7502840284323',
            'lokasi_cabang' => 'KCP Solo Slamet Riyadi',
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
