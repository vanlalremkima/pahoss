<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'location',
        'available_space',
        'available_time',
        'review',
    ];



    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }


    public function users()
    {
        return $this->hasOne(User::class);
    }
}
