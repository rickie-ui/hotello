<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // total bookings
        $bookings = DB::table('bookings')->count();

        // total rooms  available
        $rooms = DB::table('rooms')
        ->where('status', '=', 'available')
        ->count();

        // total guest
        $guests = DB::table('users')
        ->where('role', '=', 'guest')
        ->count();


        // total visitors
        $visitors = Booking::with('room', 'user')->get();


        $guests = $this->formatNumber($guests);
        $rooms = $this->formatNumber($rooms);
        $bookings = $this->formatNumber($bookings);

          // Total bookings count for the current month
        $bookingsCountThisMonth = Booking::whereMonth('created_at', Carbon::now()->month)->count();

        // Total bookings count for the current week
        $bookingsCountThisWeek = Booking::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();

            // Total rooms booked count for the current month
        $roomsBookedCountThisMonth = Booking::whereMonth('check_in', Carbon::now()->month)->distinct()->count('room_id');
        
        // Total rooms booked count for the current week
        $roomsBookedCountThisWeek = Booking::whereBetween('check_in', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->distinct()->count('room_id');
            
                // Total guests count for the current month
        $guestsCountThisMonth = User::whereMonth('created_at', Carbon::now()->month)->where('role', '==', 'guest')->count();

        // Total guests count for the current week
        $guestsCountThisWeek = User::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('role', '==', 'guest')->count();

        $bookingsCountThisMonth = $this->formatNumber($bookingsCountThisMonth);
        $bookingsCountThisWeek = $this->formatNumber($bookingsCountThisWeek);
        $roomsBookedCountThisMonth = $this->formatNumber($roomsBookedCountThisMonth);
        $roomsBookedCountThisWeek = $this->formatNumber($roomsBookedCountThisWeek);
        $guestsCountThisMonth = $this->formatNumber($guestsCountThisMonth);
        $guestsCountThisWeek = $this->formatNumber($guestsCountThisWeek);


        return view('admin.home', compact('bookings','rooms', 'guests', 'bookingsCountThisWeek','bookingsCountThisMonth', 'roomsBookedCountThisMonth', 'roomsBookedCountThisWeek', 'guestsCountThisMonth', 'guestsCountThisWeek', 'visitors' ));
    }


    // formating numbers method
     public function formatNumber($number)
        {
            // Check if the number has 4 or more digits
            if (strlen($number) >= 4) {
                // Format the number with commas
                $formattedNumber = number_format($number);
            } else {
                // Keep the original number
                $formattedNumber = $number;
            }

            return $formattedNumber;
        }
}
