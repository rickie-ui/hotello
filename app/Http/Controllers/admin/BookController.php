<?php

namespace App\Http\Controllers\admin;

use App\Models\Booking;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::with('room', 'user')->get();

        return view('admin.book', compact('bookings'));
    }

}
