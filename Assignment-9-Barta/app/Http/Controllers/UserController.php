<?php

namespace App\Http\Controllers;

use App\Models\Profile;
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
        $request->validate([
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|string|min:4',
        ]);

        // Create the user and get the instance
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => bcrypt($request->password),
        ]);

        // Now you can use $user->id to get the user ID
        Profile::create([
            'user_id' => $user->id,
        ]);

        return redirect()->route('login')->with('success', 'User registered successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id = null)
    {
        $user = User::find($id);
        return view('pages.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        if ($user->id != Auth::id()) {
            return abort(401, 'Access Denaied!');
        }
        return view('pages.edit_profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'bio'        => 'string|nullable',
            'avater'     => 'image|mimes:png,jpg,jpeg|max:2048|nullable',
            'username'   => 'nullable|string|max:20|unique:users,username|regex:/^[a-zA-Z0-9]+$/',
            'password'   => 'string|min:4',
        ]);

        $user = User::find(Auth::id());

        // Update first_name and last_name in the users table
        $user->first_name = $request->input('first_name');
        $user->last_name  = $request->input('last_name');

        if (Auth::user()->username == null) {
            $user->username = '@' . $request->username;
        }

        if($request->password != ''){
            $user->password = bcrypt($request->ipassword);
        }
        $user->save();

        // Check if the user has a profile
        $profile      = $user->profile;
        $profile->bio = $request->input('bio');

        if ($request->hasFile('avatar')) {
            $file            = $request->file('avatar');
            $fileName        = uniqid() . '.' . $file->getClientOriginalExtension();
            $path            = $file->storeAs('uploads/avatar', $fileName, 'public');
            $profile->avatar = $path;
        }

        $profile->save();

        return redirect()->back()->with('info', 'Profile updated successfully!');
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
            return redirect()->route('home')->with('success', 'User login successfully!');
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
