<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            [
                'name'=>'omar Alaa',
                'email'=>'omar2262001.6@gmail.com',
                'password'=>Hash::make('12345')
            ],
            [
                'name'=>'Ahmed Alaa',
                'email'=>'ahmed2262001.6@gmail.com',
                'password'=>Hash::make('12345')
            ]
        ]);
    }
}
