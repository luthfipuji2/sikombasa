<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ParameterDubberSeeder::class);
        $this->call(ParameterJenisLayananSeeder::class);
        $this->call(ParameterJenisTeksSeeder::class);
        $this->call(ParameterOrderDokumenSeeder::class);
        $this->call(ParameterOrderSubtitleSeeder::class);
        $this->call(ParameterOrderTeksSeeder::class);
        $this->call(ParameterOrderAudioSeeder::class);
    }
}
