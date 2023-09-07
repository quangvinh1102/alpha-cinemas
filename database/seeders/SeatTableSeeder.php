<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SeatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('seats')->truncate();
        $giatri = array("thuong", "vip");
        for($i = 1; $i < 121; $i++){
            $name = 'a'. $i;
            $price = $i * 100;
            $type_seat = "thuong";
            $random_key = array_rand($giatri);
            $giatriRandom = $giatri[$random_key];
            DB::table('seats')->insert([
                "name" => $name,
                "price" => $price,
                "type_seat" => $giatriRandom,
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
    