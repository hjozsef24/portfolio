<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RoomCard extends Component
{
    public $room_number;
    public $room_type;
    public $description;
    public $price;
    public $image_path;
    public $isEven;

    public function __construct($room, $isEven)
    {
        $this->room_number = $room['room_number'];
        $this->room_type = $room['room_type'];
        $this->description = $room['description'];
        $this->price = $room['price'];
        $this->image_path = $room['image_path'];
        $this->isEven = $isEven;
    }

    public function render()
    {
        return view('components.room-card', [
            'roomNumber' => $this->room_number,
            'roomType' => $this->room_type,
            'description' => $this->description,
            'price' => $this->price,
            'image_path' => $this->image_path,
            'isEven' => $this->isEven,
        ]);
    }
}
