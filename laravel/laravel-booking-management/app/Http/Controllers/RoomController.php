<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Request $request)
    {

        // Retrieve filter criteria from the request
        $roomType = $request->input('room_type');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        // Construct query to filter rooms
        $rooms = Room::query();

        if ($roomType) {
            $rooms->where('room_type', $roomType);
        }

        if ($minPrice) {
            $rooms->where('price', '>=', $minPrice);
        }

        if ($maxPrice) {
            $rooms->where('price', '<=', $maxPrice);
        }

        $filteredRooms = $rooms->get();

        return view('rooms.index', ['rooms' => $filteredRooms]);
    }

    public function show($roomNumber)
    {
        $room = Room::where('room_number', $roomNumber)->first();

        if (!$room) {
            abort(404);
        }

        return view('rooms.show', compact('room'));
    }
}
