<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
            'name' => 'basic user',
            'email' => 'user@mail.com',
            'password' => Hash::make('password')
        ]);
        DB::table('users')->insert([
            'name' => 'Another user',
            'email' => 'user2@mail.com',
            'password' => Hash::make('password')
        ]);
    }
}
