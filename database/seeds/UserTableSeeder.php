<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
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
       	'name' => 'Admin',
       	'username' => 'admin',
       	'email' => 'admin@gmail.com',
       	'password' => Hash::make('admin'),


       ]);



    }
}
