<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//use Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin12345'),
            'role' => 'admin',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now(),
            'status' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Klien',
            'email' => 'klien@gmail.com',
            'password' => Hash::make('klien12345'),
            'role' => 'klien',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now(),
            'status' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Translator',
            'email' => 'translator@gmail.com',
            'password' => Hash::make('translator12345'),
            'role' => 'translator',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now(),
            'status' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Qonitha Prasetyowati',
            'email' => 'qonitha@gmail.com',
            'password' => Hash::make('qonitha12345'),
            'role' => 'admin',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now(),
            'status' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Luthfi Puji',
            'email' => 'luthfi@gmail.com',
            'password' => Hash::make('luthfi12345'),
            'role' => 'klien',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now(),
            'status' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Pramesti Dyah',
            'email' => 'dyah@gmail.com',
            'password' => Hash::make('dyah12345'),
            'role' => 'translator',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now(),
            'status' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Nursiah Hayati',
            'email' => 'nursiah@gmail.com',
            'password' => Hash::make('nursiah12345'),
            'role' => 'admin',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now(),
            'status' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Lidya A',
            'email' => 'lidya@gmail.com',
            'password' => Hash::make('lidya12345'),
            'role' => 'klien',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now(),
            'status' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Bagas Pramudya',
            'email' => 'bagas@gmail.com',
            'password' => Hash::make('bagas12345'),
            'role' => 'translator',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now(),
            'status' => 1
        ]);
    }
}
