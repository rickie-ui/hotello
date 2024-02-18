<?php

namespace App\Http\Controllers\users;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $rooms = DB::table('rooms')
            ->where('status', '=', 'available')
                  ->latest()
                  ->get();

        return view('users.pages.dashboard', compact('rooms'));
    }

}
