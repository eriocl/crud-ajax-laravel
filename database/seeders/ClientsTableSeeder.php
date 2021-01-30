<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('clients')->insert([
            ['id' => '1', 'gender' => 'male', 'name' => 'Ivanov I.I.', 'phone' => '89057895656', 'address' => 'Russia'],
            ['id' => '2', 'gender' => 'male', 'name' => 'Semenov I.I.', 'phone' => '89057895456', 'address' => 'Russia']
        ]);
    }
}
