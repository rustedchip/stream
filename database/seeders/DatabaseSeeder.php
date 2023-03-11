<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => env('STREAM_NAME', 'admin'),
            'email' => env('STREAM_EMAIL', 'admin@admin.com'),
            'password' => Hash::make(env('STREAM_PASSWORD', 'password')),
        ]);
    }
}
