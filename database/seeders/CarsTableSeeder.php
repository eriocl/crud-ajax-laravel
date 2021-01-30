<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('cars')->insert([
            ['id' => 1, 'client_id' => 1, 'brand' => 'bmw', 'model' => 'x5', 'color' => 'red', 'car_number' => 'a456yu', 'parking' => 0],
            ['id' => 2, 'client_id' => 1, 'brand' => 'audi', 'model' => 'q7', 'color' => 'black', 'car_number' => 'b476yu', 'parking' => 0],
            ['id' => 3, 'client_id' => 2, 'brand' => 'bmw', 'model' => 'x3', 'color' => 'yellow', 'car_number' => 'a459yu', 'parking' => 0],
            ['id' => 4, 'client_id' => 2, 'brand' => 'toyota', 'model' => 'camry', 'color' => 'blue', 'car_number' => 'a456uu', 'parking' => 0]
        ]);
    }
}
