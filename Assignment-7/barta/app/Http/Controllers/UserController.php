<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('componants.auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('componants.auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        // dd($request->all());

        $request->validate([
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|string|min:4',
        ]);

        // Create user if validation passes
        User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => bcrypt($request->password),
            // 'password'   => $request->password,
        ]);

        // Redirect with success message
        return redirect()->back()->with('success', 'User registered successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id = null)
    {
        return view('pages.profile');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function login(Request $request)
    {
        // dd($request->all());

        // Validate login credentials
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:4',
        ]);

        // Attempt to log in the user with the provided credentials
        if (Auth::attempt($credentials)) {
            // Regenerate session to prevent fixation attacks
            $request->session()->regenerate();

            // Flash success message to the session
            return redirect()->route('profile')->with('success', 'User login successfully!');

            // Redirect to profile route with a slight delay (half a second)

        }

        // If authentication fails, redirect back with error messages
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        // Log out the user
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
