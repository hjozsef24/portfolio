<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
            'room_number' => '100',
            'room_type' => 'Capsule',
            'description' => 'A small room for one person only.',
            'price' => 50.00,
            'image_path' => 'images/rooms/capsule.jpeg'
        ]);

        Room::create([
            'room_number' => '200',
            'room_type' => 'Standard',
            'description' => 'A comfortable standard room with essential amenities.',
            'price' => 100.00,
            'image_path' => 'images/rooms/standard.jpg'
        ]);

        Room::create([
            'room_number' => '300',
            'room_type' => 'Deluxe',
            'description' => 'A spacious deluxe room with additional features.',
            'price' => 150.00,
            'image_path' => 'images/rooms/deluxe.jpg'
        ]); 

    }
}
