<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function show($roomNumber)
    {
        $room = Room::where('room_number', $roomNumber)->first();
        $user = Auth::user();

        return view('booking.booking', compact('room', 'user'));
    }

    public function store(Request $request)
    {

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $roomId = $request->input('room_id');

        $room = Room::findOrFail($roomId);

        $validated = $request->validate([
            'start_date' => 'required',
            'end_date' => 'required'
        ], [
            'start_date.required' => 'Please select at least one night!',
            'end_date.required' => 'Please select at least one night!'
        ]);

        $existingBooking = $room->bookings()
        ->where(function ($query) use ($startDate, $endDate) {
            $query->where(function ($q) use ($startDate) {
                $q->where('start_date', '<=', $startDate)
                    ->where('end_date', '>=', $startDate);
            })->orWhere(function ($q) use ($endDate) {
                $q->where('start_date', '<=', $endDate)
                    ->where('end_date', '>=', $endDate);
            })->orWhere(function ($q) use ($startDate, $endDate) {
                $q->where('start_date', '>=', $startDate)
                    ->where('end_date', '<=', $endDate);
            });
        })
        ->exists();

        if ($existingBooking) {
            return back()->withInput()->withErrors(['error' => 'There is already a booking for this room during the selected dates.']);
        }

        $validated['room_id'] = $roomId;

        $user_id = Auth::id();
        $validated['user_id'] = $user_id;

        Booking::create($validated);

        return view('home');
    }
}
