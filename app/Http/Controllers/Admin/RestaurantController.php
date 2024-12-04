<?php

namespace App\Http\Controllers\Admin;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreRestaurantRequest;

class RestaurantController extends Controller
{
    public function create()
    {
        if (auth()->user()->restaurant) {
            return redirect()->route('home')->with('error', "You've already created a restaurant!");
        }
        return view('admin.restaurants.create');
    }

    public function store(StoreRestaurantRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $filepath = Storage::disk('public')->put('images/restaurants', $request->file('image'));
            $validated['image'] = $filepath;
        }

        Restaurant::create([
            'user_id' => auth()->id(),
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'image' => $validated['image'] ?? null,
            'address' => $validated['address'],
            'city' => $validated['city'],
            'VAT' => $validated['VAT'],
        ]);

        return redirect()->route('home')->with('success', 'Restaurant has been created successfully!');
    }
}