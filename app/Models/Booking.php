<?php

namespace App\Models;
use App\Models\Parking;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;



    protected $fillable = [
        'user_id',
        'parking_id',
        'token',
    ];



}
