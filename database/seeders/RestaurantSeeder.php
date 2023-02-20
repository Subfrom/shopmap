<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Restaurant::create([
            'name' => 'The Vita Cafe',
            'address' => '123 Bang sue',
            'city' => 'Bangkok',
            'state' => 'Bang sue',
            'hours' => '7:00am-10:00pm',
            'latitude' => 13.828250,
            'longitude' => 100.528580,
        ]);

        Restaurant::create([
            'name' => 'The BBQ',
            'address' => '123 Test',
            'city' => 'Bangkok',
            'state' => 'Bang sue',
            'hours' => '7:00am-10:00pm',
            'latitude' => 13.828510,
            'longitude' => 100.527346,
        ]);

        Restaurant::create([
            'name' => 'Cafe',
            'address' => '99 Test',
            'city' => 'Bangkok',
            'state' => 'Bang sue',
            'hours' => '7:00am-10:00pm',
            'latitude' => 13.828073,
            'longitude' => 100.528677,
        ]);
    }
}