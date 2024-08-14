<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Show the form for registering a new manager.
     */
    public function showRegisterManagerForm()
    {
        return view('admin.dashboard'); // Ensure this view has the form included
    }

    /**
     * Handle the registration of a new manager.
     */
    public function registerManager(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the new manager
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'usertype' => 'manager',
        ]);

        return redirect()->route('admin.dashboard')->with('status', 'Manager registered successfully!');
    }
}
