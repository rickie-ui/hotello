<?php

namespace App\Http\Controllers\users;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = auth()->id();

        $bookings = Booking::with('room', 'user')->where('user_id', '=', $id)->get();

        return view('users.pages.booking', compact('bookings'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $room = Room::find($id);

        return view('users.pages.reserve', compact('room',));
    }

      /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
                 // validating request
        $formFields = $request->validate([
            'check_in' => 'required',
            'check_out' => 'required',
            'total_person' => 'required|numeric',
            'note' => 'required|max:255',
        ]);

        $user = auth()->user();
        $room = Room::find($id);

        $formFields['user_id'] = $user->id;
        $formFields['room_id'] = $room->id;

            // Calculate total amount based on room rate and duration of stay
        $totalAmount = $room->rate * $this->calculateStayDuration($formFields['check_in'], $formFields['check_out']);
        $formFields['total_amount'] = $totalAmount;

        
        $booking = Booking::Create($formFields);

           // Update room status
        $room = $booking->room;
        if ($room) {
            $room->update(['status' => 'booked']);
        }

         return redirect()->back()->with('message', 'Thank you. Your reservation has been received!.');
    }

            /**
         * Calculate the duration of stay in days.
         */
        private function calculateStayDuration($checkIn, $checkOut)
        {
            $checkInDate = new \DateTime($checkIn);
            $checkOutDate = new \DateTime($checkOut);
            $duration = $checkInDate->diff($checkOutDate);
            
            return $duration->days;
        }

          /**
     * update booking status approve.
     */
    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);

           $room = $booking->room;
        
        // Update the status in the database as needed
        $booking->update(['status' => 'canceled']);

         if ($room) {
            $room->update(['status' => 'available']);
        }

        return redirect()->back()->with('status', 'Status updated successfully!');
    }

    /**
     * update booking status reject.
     */
    public function checkIn($id)
    {
         $booking = Booking::findOrFail($id);
        $room = $booking->room;


        // Update the status in the database as needed
        $booking->update(['status' => 'checked-in']);

         if ($room) {
            $room->update(['status' => 'occupied']);
        }

        return redirect()->back()->with('status', 'Status updated successfully!'); 
    }

    /**
     * update booking status hire.
     */
    public function checkOut($id)
    {
         $booking = Booking::findOrFail($id);
         $room = $booking->room;


        // Update the status in the database as needed
        $booking->update(['status' => 'checked-out']);

         if ($room) {
            $room->update(['status' => 'available']);
        }

        return redirect()->back()->with('status', 'Status updated successfully!'); 
    }


}
