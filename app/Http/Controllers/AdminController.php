<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tour;

class AdminController extends Controller
{
    public function addTourForm() {
        return view('tour_add');
    }
    public function saveTour(Request $request) {
        Tour::create(['name' => $request->name, 'country' => $request->country,'people' => $request->people,'nights' => $request->nights,'image' => $request->image,'operators_id' => $request->operators_id,'price' => $request->price]);
        return redirect()->route('home');
    }
}
