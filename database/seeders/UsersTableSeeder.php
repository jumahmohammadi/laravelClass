<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; 
use DB; 
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->updateOrInsert(
		  ['id'=>1],
		  [
		   'name'=>"Ahmad",
		   'last_name'=>"Ahmadi",
		   'detail'=>"I am a bloger and Web Designer ",
		   'photo'=>"users/user.jpg",
		   'password' => Hash::make('12345678'),
		   'email' => 'admin@gmail.com'
		]);
    }
}
