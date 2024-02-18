<?php

namespace App\Models;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'room',
        'rate',
        'bed',
        'size',
        'conditioner',
        'photo',
        'description',
        'status',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'room_id');
    }
}
