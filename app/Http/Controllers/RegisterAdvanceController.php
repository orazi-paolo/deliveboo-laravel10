<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tipology;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterAdvanceController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'name' => 'required|string|max:255',
            'address' => 'required,string|max:255',
            'VAT' => 'required|regex:/^[A-Z0-9]{11}$/',
            'tipologies' => 'required|array|min:1',
            'tipologies.*' => 'exists:tipologies,id',
            'city' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $user = User::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'name' => $validated['name'],
        ]);

        $imagePath = $request->file('image')->store('restaurants', 'public');
        $restaurant = Restaurant::create([
            'user_id' => $user->id,
            'name' => $validated['name'],
            'address' => $validated['address'],
            'VAT' => $validated['VAT'],
            'city' => $validated['city'],
            'description' => $validated['description'],
            'image' => $imagePath,
        ]);

        $restaurant->tipologies()->sync($validated['tipologies']);

        return redirect()->route('login')->with('success', 'Registration completed successfully!');
    }

    public function showRegisterForm()
    {
        $tipologies = Tipology::all();
        return view('register', compact('tipologies'));
    }
}