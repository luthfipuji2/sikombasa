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
            'nama_rekening' => 'Qonitha Prasetyowati',
            'no_rekening' => '4729847248091',
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('bank')->insert([
            'nama_bank' => 'BRI',
            'nama_rekening' => 'Luthfi Puji',
            'no_rekening' => '09402840280913',
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('bank')->insert([
            'nama_bank' => 'BNI',
            'nama_rekening' => 'Pramesti Dyah',
            'no_rekening' => '219381830183',
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('bank')->insert([
            'nama_bank' => 'Mandiri',
            'nama_rekening' => 'Nursiah Hayati',
            'no_rekening' => '7502840284323',
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
