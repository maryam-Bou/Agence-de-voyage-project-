<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            [
                'name' => 'Marrakech',
                'description' => 'The Red City, known for its vibrant markets, historic medina, and beautiful palaces.',
                'image' => 'locations/marrakech.jpg'
            ],
            [
                'name' => 'Casablanca',
                'description' => 'Morocco\'s largest city and economic hub, featuring the impressive Hassan II Mosque.',
                'image' => 'locations/casablanca.jpg'
            ],
            [
                'name' => 'Fes',
                'description' => 'The cultural and spiritual capital of Morocco, home to the world\'s oldest university.',
                'image' => 'locations/fes.jpg'
            ],
            [
                'name' => 'Chefchaouen',
                'description' => 'The Blue City, famous for its blue-painted buildings and stunning mountain views.',
                'image' => 'locations/chefchaouen.jpg'
            ],
            [
                'name' => 'Merzouga',
                'description' => 'A small town on the edge of the Sahara Desert, known for its sand dunes and desert experiences.',
                'image' => 'locations/merzouga.jpg'
            ],
            [
                'name' => 'Essaouira',
                'description' => 'A charming coastal city with a historic medina, known for its beaches and water sports.',
                'image' => 'locations/essaouira.jpg'
            ],
            [
                'name' => 'Tangier',
                'description' => 'A historic port city where the Mediterranean meets the Atlantic, known for its international influence.',
                'image' => 'locations/tangier.jpg'
            ],
            [
                'name' => 'Agadir',
                'description' => 'A modern beach resort city with beautiful coastline and year-round sunshine.',
                'image' => 'locations/agadir.jpg'
            ]
        ];

        Location::insert($locations);
    }
}
