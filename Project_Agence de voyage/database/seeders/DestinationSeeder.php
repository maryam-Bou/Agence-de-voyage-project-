<?php

namespace Database\Seeders;

use App\Models\Destination;
use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = Location::all();

        $destinations = [
            [
                'name' => 'Bahia Palace',
                'description' => 'A masterpiece of Moroccan architecture, the Bahia Palace is a stunning example of 19th-century Moroccan design with its intricate tilework, carved wooden ceilings, and beautiful gardens.',
                'price' => 1200,
                'location_id' => $locations->where('name', 'Marrakech')->first()->id,
                'image' => 'images/destination/bahia-palace.png',
                'duration' => 1,
                'included_services' => 'Guided tour, Transportation, Local guide, Photography session',
                'max_guests' => 15,
                'departure_date' => now()->addDays(7),
                'return_date' => now()->addDays(8),
                'transportation' => 'Private Van',
                'accommodation' => 'Not Included',
                'meals' => 'Not Included',
                'highlights' => 'Historic Architecture, Beautiful Gardens, Traditional Moroccan Design, Photography Opportunities',
                'itinerary' => "Full day tour of Bahia Palace including gardens and historical rooms"
            ],
            [
                'name' => 'Jardin Majorelle',
                'description' => 'A beautiful botanical garden and artist\'s landscape garden in Marrakech, Morocco. It was designed by the French Orientalist artist Jacques Majorelle.',
                'price' => 1000,
                'location_id' => $locations->where('name', 'Marrakech')->first()->id,
                'image' => 'images/destination/jardin-majorelle.png',
                'duration' => 1,
                'included_services' => 'Guided tour, Transportation, Local guide, Garden access',
                'max_guests' => 12,
                'departure_date' => now()->addDays(14),
                'return_date' => now()->addDays(15),
                'transportation' => 'Private Van',
                'accommodation' => 'Not Included',
                'meals' => 'Not Included',
                'highlights' => 'Botanical Garden, Blue Villa, Berber Museum, Cactus Collection',
                'itinerary' => "Morning tour of Jardin Majorelle including museum visit"
            ],
            [
                'name' => 'Hassan II Mosque',
                'description' => 'The largest mosque in Morocco and the 7th largest in the world. Its minaret is the world\'s tallest at 210 meters.',
                'price' => 1500,
                'location_id' => $locations->where('name', 'Casablanca')->first()->id,
                'image' => 'images/destination/hassan-ii-mosque.png',
                'duration' => 1,
                'included_services' => 'Guided tour, Transportation, Local guide, Mosque access',
                'max_guests' => 20,
                'departure_date' => now()->addDays(21),
                'return_date' => now()->addDays(22),
                'transportation' => 'Private Van',
                'accommodation' => 'Not Included',
                'meals' => 'Not Included',
                'highlights' => 'Architectural Marvel, Ocean View, Glass Floor, Minaret Visit',
                'itinerary' => "Full day tour of Hassan II Mosque including interior and exterior"
            ],
            [
                'name' => 'Fes El Bali',
                'description' => 'The world\'s largest car-free urban area and a UNESCO World Heritage site. It is the oldest walled part of Fes, Morocco.',
                'price' => 1800,
                'location_id' => $locations->where('name', 'Fes')->first()->id,
                'image' => 'images/destination/fes-el-bali.png',
                'duration' => 2,
                'included_services' => 'Guided tour, Transportation, Local guide, Traditional lunch',
                'max_guests' => 15,
                'departure_date' => now()->addDays(28),
                'return_date' => now()->addDays(30),
                'transportation' => 'Private Van',
                'accommodation' => 'Traditional Riad',
                'meals' => 'Breakfast & Lunch',
                'highlights' => 'Medina Tour, Traditional Markets, Historical Sites, Local Culture',
                'itinerary' => "Day 1: Morning Medina Tour, Afternoon Traditional Markets\nDay 2: Historical Sites and Local Culture Experience"
            ],
            [
                'name' => 'Hercules Cave',
                'description' => 'A natural cave formation at the Strait of Gibraltar, with a unique opening to the sea shaped like the map of Africa.',
                'price' => 1300,
                'location_id' => $locations->where('name', 'Tangier')->first()->id,
                'image' => 'images/destination/hercules-cave.png',
                'duration' => 1,
                'included_services' => 'Guided tour, Transportation, Local guide, Cave access',
                'max_guests' => 12,
                'departure_date' => now()->addDays(35),
                'return_date' => now()->addDays(36),
                'transportation' => 'Private Van',
                'accommodation' => 'Not Included',
                'meals' => 'Not Included',
                'highlights' => 'Natural Cave, Sea Views, Photography, Local History',
                'itinerary' => "Full day tour including cave visit and surrounding area"
            ],
            [
                'name' => 'Agadir Beach',
                'description' => 'A beautiful beach resort city on Morocco\'s southern Atlantic coast, known for its golden beaches and modern architecture.',
                'price' => 2000,
                'location_id' => $locations->where('name', 'Agadir')->first()->id,
                'image' => 'images/destination/agadir-beach.png',
                'duration' => 3,
                'included_services' => 'Beach activities, Transportation, Local guide, Water sports',
                'max_guests' => 15,
                'departure_date' => now()->addDays(42),
                'return_date' => now()->addDays(45),
                'transportation' => 'Private Van',
                'accommodation' => 'Beachfront Hotel',
                'meals' => 'Breakfast & Dinner',
                'highlights' => 'Beach Activities, Water Sports, Sunset Views, Local Markets',
                'itinerary' => "Day 1: Beach Activities\nDay 2: Water Sports and Local Markets\nDay 3: Sunset Cruise"
            ],
            [
                'name' => 'Corniche Ain Diab',
                'description' => 'A famous coastal road in Casablanca, known for its beautiful beaches, restaurants, and entertainment venues.',
                'price' => 1100,
                'location_id' => $locations->where('name', 'Casablanca')->first()->id,
                'image' => 'images/destination/corniche-ain-diab.png',
                'duration' => 1,
                'included_services' => 'Guided tour, Transportation, Local guide, Beach access',
                'max_guests' => 15,
                'departure_date' => now()->addDays(49),
                'return_date' => now()->addDays(50),
                'transportation' => 'Private Van',
                'accommodation' => 'Not Included',
                'meals' => 'Not Included',
                'highlights' => 'Coastal Views, Beach Activities, Local Restaurants, Sunset Views',
                'itinerary' => "Full day tour including beach activities and local cuisine"
            ],
            [
                'name' => 'Chouara Tannery',
                'description' => 'One of the three main tanneries in Fes, Morocco, known for its traditional leather-making process and unique architecture.',
                'price' => 1400,
                'location_id' => $locations->where('name', 'Fes')->first()->id,
                'image' => 'images/destination/chouara-tannery.png',
                'duration' => 1,
                'included_services' => 'Guided tour, Transportation, Local guide, Traditional mint',
                'max_guests' => 10,
                'departure_date' => now()->addDays(56),
                'return_date' => now()->addDays(57),
                'transportation' => 'Private Van',
                'accommodation' => 'Not Included',
                'meals' => 'Not Included',
                'highlights' => 'Traditional Tanning Process, Photography, Local Crafts, Historical Site',
                'itinerary' => "Full day tour including tannery visit and local market"
            ],
            [
                'name' => 'Cap Spartel',
                'description' => 'A promontory in Morocco about 1,000 feet above sea level at the entrance to the Strait of Gibraltar, 12 km west of Tangier.',
                'price' => 1600,
                'location_id' => $locations->where('name', 'Tangier')->first()->id,
                'image' => 'images/destination/cap-spartel.png',
                'duration' => 1,
                'included_services' => 'Guided tour, Transportation, Local guide, Lighthouse visit',
                'max_guests' => 12,
                'departure_date' => now()->addDays(63),
                'return_date' => now()->addDays(64),
                'transportation' => 'Private Van',
                'accommodation' => 'Not Included',
                'meals' => 'Not Included',
                'highlights' => 'Lighthouse Visit, Ocean Views, Photography, Local History',
                'itinerary' => "Full day tour including lighthouse and surrounding area"
            ],
            [
                'name' => 'Souss-Massa',
                'description' => 'A national park in Morocco, known for its diverse wildlife and beautiful landscapes, including the last remaining wild population of Northern Bald Ibis.',
                'price' => 2200,
                'location_id' => $locations->where('name', 'Agadir')->first()->id,
                'image' => 'images/destination/souss-massa.png',
                'duration' => 2,
                'included_services' => 'Guided tour, Transportation, Local guide, Wildlife viewing',
                'max_guests' => 8,
                'departure_date' => now()->addDays(70),
                'return_date' => now()->addDays(72),
                'transportation' => '4x4 Vehicle',
                'accommodation' => 'Eco Lodge',
                'meals' => 'Full Board',
                'highlights' => 'Wildlife Viewing, Bird Watching, Nature Photography, Local Culture',
                'itinerary' => "Day 1: Morning Wildlife Tour, Afternoon Bird Watching\nDay 2: Nature Photography and Local Culture"
            ]
        ];

        foreach ($destinations as $destination) {
            Destination::create($destination);
        }
    }
}
