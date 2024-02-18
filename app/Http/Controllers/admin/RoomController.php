<?php

namespace App\Http\Controllers\admin;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           $rooms = DB::table('rooms')
                  ->latest()
                  ->get();
        return view('admin.room', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validating request
          $formFields = $request->validate([
            'room' => 'required',
            'rate' => 'required|integer',
            'bed' => 'required|integer',
            'size' => 'required|numeric',
            'photo' => 'required|image|mimes:jpeg,png,webp|max:1024',
            'conditioner' => 'required',
            'description' => 'required|max:50',

        ]);

             if ($request->hasFile('photo')) {

                $formFields['photo'] = $request->file('photo')->store('photos', 'public');
            }

            Room::create($formFields);

            return redirect()->back()->with('message', 'Room added successfully!');
    }

    public function show($id) {

        $room = Room::find($id);

        return view('admin.edit', compact('room'));
    }


    // update a room
    public function update(Request $request, $id) {
    
          $room = Room::find($id);
           // validating request
          $formFields = $request->validate([
            'room' => 'required',
            'rate' => 'required|integer',
            'bed' => 'required|integer',
            'size' => 'required|numeric',
            'conditioner' => 'required',
            'description' => 'required|max:50',

        ]);

             if ($request->hasFile('photo')) {

                $formFields['photo'] = $request->file('photo')->store('photos', 'public');
            }

        $room->update($formFields);
    
        return redirect()->back()->with('message', 'Room updated successfully!');

    }

    // deleting a room
     public function destroy($id) {
        
        $room = Room::find($id);

        $room->delete();

        return redirect()->back()->with('success', 'Room deleted successfully.');
    }

}
