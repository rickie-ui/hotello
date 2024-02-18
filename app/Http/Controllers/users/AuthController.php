<?php

namespace App\Http\Controllers\users;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function signup()
    {
        return view('users.auth.signup');
    }

    /**
     * Show the form for login
     */
    public function signin()
    {
        return view('users.auth.signin');
    }

    /**
     * admin registration page.
     */
    public function register()
    {
       return view('admin.auth.register');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            // validating request
          $formFields = $request->validate([
            'full_name' => 'required|max:255',
            'email' => ['required', 'email:strict,dns', Rule::unique('users', 'email')],
            'password' => 'required|min:6',
        ]);

        //Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        // role in db
        $formFields['role'] = 'guest';
        
        User::Create($formFields);
       
        Auth::attempt($request->only('email','password'));
    
        return redirect()->route('dashboard');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function login(Request $request)
    {
         $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $user = auth()->user();

            if ($user->role === 'guest') {
                return redirect()->route('dashboard');
            } elseif ($user->role === 'admin') {
                return redirect()->route('home');
            }
        }

        return back()->with('message', 'Invalid credentials!');
    }

    /**
     * admin method to create new account.
     */
    public function create(Request $request)
    {
         // validating request
          $formFields = $request->validate([
            'full_name' => 'required|max:255',
            'email' => ['required', 'email:strict,dns', Rule::unique('users', 'email')],
            'password' => 'required|min:6',
        ]);

        //Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        // role in db
        $formFields['role'] = 'admin';
        
        User::Create($formFields);
       
        Auth::attempt($request->only('email','password'));
    
        return redirect()->route('home');
    }


      //  logout logic for both admin/applicant

     public function logout()
    {
        if (auth()->check()) {
            $user = auth()->user();

            if ($user) {
                Auth::logout();
                return redirect()->route('signin');
            } 
        }

    }

}
