<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
	    'role' => 2,
            'password' => Hash::make('password'),
        ]);
	DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
	    'role' => 1,
            'password' => Hash::make('password'),
        ]);
    }
}
