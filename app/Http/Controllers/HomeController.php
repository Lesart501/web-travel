<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tour;
use App\Models\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('home', ['orders' => Auth::user()->order()->latest()->get()]);
    }
    // Сделать бронь
    public function book(Request $request, Tour $tour){
        Order::create(['users_id', 'tours_id', 'out_date', 'return_date']);
    }
}
