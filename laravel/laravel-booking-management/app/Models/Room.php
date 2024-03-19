<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = ['room_number', 'room_type', 'description', 'price', 'image_path'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    
}
