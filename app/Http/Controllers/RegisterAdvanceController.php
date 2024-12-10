<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tipology;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterAdvanceRequest;

class RegisterAdvanceController extends Controller
{
    public function register(RegisterAdvanceRequest $request)
    {
        $validated = $request->validated();


        $user = User::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'name' => $validated['name'],
        ]);

        Auth::login($user);

        $imagePath = $request->file('image')->store('restaurants', 'public');
        $restaurant = Restaurant::create([
            'user_id' => $user->id,
            'name' => $validated['name'],
            'address' => $validated['address'],
            'VAT' => $validated['VAT'],
            'city' => $validated['city'],
            'description' => $validated['description'],
            'image' => url('storage/' . $imagePath),
            'image_placeholder' => "https://images.pexels.com/photos/1307698/pexels-photo-1307698.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
        ]);

        $restaurant->tipologies()->sync($validated['tipologies']);

        return redirect()->route('home')
            ->with('message', 'Registration completed successfully!')
            ->with('alert-class', 'success');
    }

    public function showRegisterForm()
    {
        if (Auth::check()) {
        return redirect()->route('home');
        }
        $tipologies = Tipology::all();
        return view('register', compact('tipologies'));
    }
}
