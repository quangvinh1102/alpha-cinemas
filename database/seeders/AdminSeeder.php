<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        $admins = [
            [
                'fullname' => 'admin1',
                'avatar' =>'public/avatar/admin-default.png',
                'email' => 'admin1@gmail.com',
                'password' => Hash::make('admin1'),
                'phone' => $faker->PhoneNumber(),
                'gender' => 0,
                'birthday' => '2002-10-02',
                'created_at' => Carbon::now(),
            ],

        ];

        DB::table('admin')->insert($admins);
    }
}
