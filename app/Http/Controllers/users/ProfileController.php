<?php

namespace App\Http\Controllers\users;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $user = User::find($id);
        $profile = Profile::where('user_id', $user->id)->first();

        return view('users.pages.profile', compact('user','profile'));
    }

 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
             $user = User::find($id);
    

        $request->validate([
            'full_name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'gender' => ['required'],
        ]);

        $user->update([
            'full_name' => $request->full_name,
            'email' => $request->email,
        ]);
            // Retrieve or create the profile associated with the user
        $profile = $user->profile ?? new Profile(['user_id' => $user->id]);
        
        $profile->phone = $request->phone;
        $profile->gender = $request->gender;

        // Save the Profile model
        $profile->save();

        return redirect()->back()->with('message', 'Information updated successfully!');
    }

}
