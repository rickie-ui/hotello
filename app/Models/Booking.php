<?php

namespace App\Models;

use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'room_id',
        'check_in',
        'check_out',
        'total_person',
        'total_amount',
        'status'
    ];

    // Booking.php model
public function room()
{
    return $this->belongsTo(Room::class, 'room_id');
}
 public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
