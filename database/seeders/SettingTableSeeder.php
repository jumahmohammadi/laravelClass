<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB; 
class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('setting')->updateOrInsert(
		 ['id'=>1],
		 [
		   'id'=>1,
		   'title'=>'LaraBlog',
		   'detail'=>"Hello, We’re content writer who is fascinated by content fashion, celebrity and lifestyle. We helps clients bring the right content to the right people.",
		   'address'=>'Afghanistan, Herat',
		   'logo'=>'setting/logo.svg',
		   'email'=>'admin@gmail.com',
		   'phone'=>'0789789789',
		 ]
		);
    }
}
